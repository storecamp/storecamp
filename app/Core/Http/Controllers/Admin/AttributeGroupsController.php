<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\AttributeGroupSystemContract;
use App\Core\Models\AttributeGroup;
use App\Core\Repositories\AttributeGroupDescriptionRepository;
use App\Core\Repositories\AttributeGroupRepository;
use App\Core\Transformers\AttributeGroupsDataTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

/**
 * Class AttributeGroupsController.
 */
class AttributeGroupsController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = 'admin.attribute_groups.';
    /**
     * @var string
     */
    public $errorRedirectPath = 'admin/attribute_groups';

    /**
     * @var AttributeGroupRepository
     */
    protected $groupRepository;
    /**
     * @var AttributeGroupDescriptionRepository
     */
    protected $groupDescriptionRepository;
    /**
     * @var AttributeGroupSystemContract
     */
    protected $attributeGroupSystem;

    /**
     * AttributeGroupsController constructor.
     *
     * @param AttributeGroupSystemContract $attributeGroupSystem
     */
    public function __construct(AttributeGroupSystemContract $attributeGroupSystem)
    {
        $this->attributeGroupSystem = $attributeGroupSystem;
        $this->groupRepository = $attributeGroupSystem->group;
        $this->groupDescriptionRepository = $attributeGroupSystem->description;
        $this->middleware('role:Admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $groupAttributes = $this->attributeGroupSystem->presentGroup($data);

        $no = $groupAttributes->firstItem();

        return $this->view('index', compact('groupAttributes', 'no'));
    }

    /**
     * @param DataTables $datatables
     *
     * @return mixed
     */
    public function data(DataTables $datatables)
    {
        $query = AttributeGroup::query();

        return $datatables->eloquent($query)
            ->setTransformer(new AttributeGroupsDataTransformer())
            ->make(true);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $groupAttributes = $this->groupRepository->all()->pluck('name', 'id');

        return $this->view('create', compact('groupAttributes'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            \DB::beginTransaction();
            $data = $request->all();
            $group = $this->attributeGroupSystem->createGroup($data);
            \DB::commit();

            return redirect('admin/attribute_groups');
        } catch (\Throwable $exception) {
            \DB::rollBack();

            return $this->redirectNotFound($exception);
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return Response|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        try {
            $data = $request->all();
            $groupAttributes = $this->attributeGroupSystem->presentGroup($data, $id);

            return $this->view('show', compact('groupAttributes'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return Response|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        try {
            $data = $request->all();
            $groupAttribute = $this->attributeGroupSystem->presentGroup($data, $id);

            return $this->view('edit', compact('groupAttribute'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return Response|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            \DB::beginTransaction();
            $data = $request->except('_method', '_token');
            $groupAttribute = $this->attributeGroupSystem->updateGroup($data, $id);
            \DB::commit();

            return redirect('admin/attribute_groups');
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();

            return $this->redirectNotFound();
        } catch (\Throwable $exception) {
            \DB::rollBack();

            return $this->redirectNotFound($exception);
        }
    }

    /**
     * @param $id
     *
     * @return Response|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            \DB::beginTransaction();
            $deleted = $this->groupRepository->delete($id);
            if (!$deleted) {
                $this->flash('warning', 'Item not deleted. Some error appeared!');
                \DB::rollBack();
            }
            \DB::commit();

            return redirect('admin/attribute_groups');
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();

            return $this->redirectNotFound($e);
        }
    }

    /**
     * get groups name in json format.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getJson(Request $request)
    {
        $query = $this->parserSearchValue($request->get('search'));
        $attrGroup = $this->groupRepository->getModel()->where('name', 'like', $query)->select('name', 'id')->get();
        $attrGroupArr = [];
        foreach ($attrGroup as $key => $attrGroupItem) {
            $attrGroupArr[$key]['text'] = $attrGroupItem['name'];
            $attrGroupArr[$key]['id'] = $attrGroupItem['id'];
        }

        return \Response::json($attrGroupArr);
    }
}
