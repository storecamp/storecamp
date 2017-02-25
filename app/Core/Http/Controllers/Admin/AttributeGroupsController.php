<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Components\Flash\Flash;
use App\Core\Contracts\AttributeGroupSystemContract;
use App\Core\Repositories\AttributeGroupDescriptionRepository;
use App\Core\Repositories\AttributeGroupRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class AttributeGroupsController
 * @package App\Core\Http\Controllers\Admin
 */
class AttributeGroupsController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = "admin.attribute_groups.";
    /**
     * @var string
     */
    public $errorRedirectPath = "admin/attribute_groups";

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
     * @param AttributeGroupSystemContract $attributeGroupSystem
     */
    function __construct(AttributeGroupSystemContract $attributeGroupSystem)
    {
        $this->attributeGroupSystem = $attributeGroupSystem;
        $this->groupRepository = $attributeGroupSystem->group;
        $this->groupDescriptionRepository = $attributeGroupSystem->description;
    }


    /**
     * @param Request $request
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
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $groupAttributes = $this->groupRepository->all()->pluck('name', 'id');
        return $this->view('create', compact('groupAttributes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $group = $this->attributeGroupSystem->createGroup($data);
            return redirect('admin/attribute_groups');
        } catch
        (\Throwable $exception) {
            return $this->redirectNotFound($exception);
        }
    }

    /**
     * @param Request $request
     * @param $id
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
     * @return Response|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_method', '_token');
            $groupAttribute = $this->attributeGroupSystem->updateGroup($data, $id);

            return redirect('admin/attribute_groups');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        } catch (\Throwable $exception) {
            return $this->redirectNotFound($exception);
        }
    }

    /**
     * @param $id
     * @return Response|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->groupRepository->delete($id);
            if (!$deleted) {
                Flash::warning("Item not deleted. Some error appeared!");
            }
            return redirect('admin/attribute_groups');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * get groups name in json format
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getJson(Request $request)
    {
        $query = $this->parserSearchValue($request->get('search'));
        $attrGroup = $this->groupRepository->getModel()->where("name", "like", $query)->select('name', 'id')->get();
        $attrGroupArr = [];
        foreach ($attrGroup as $key => $attrGroupItem) {
            $attrGroupArr[$key]['text'] = $attrGroupItem['name'];
            $attrGroupArr[$key]['id'] = $attrGroupItem['id'];
        }
        return \Response::json($attrGroupArr);
    }
}
