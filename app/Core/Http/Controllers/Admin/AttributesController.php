<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\AttributeGroupSystemContract;
use App\Core\Models\AttributeGroupDescription;
use App\Core\Transformers\AttributeGroupDescriptionDataTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

/**
 * Class AttributesController.
 */
class AttributesController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = 'admin.attributes.';
    /**
     * @var string
     */
    public $errorRedirectPath = 'admin/attributes';

    /**
     * @var AttributeGroupSystemContract
     */
    protected $attributeGroupSystem;
    /**
     * @var
     */
    protected $groupRepository;
    /**
     * @var
     */
    protected $groupDescriptionRepository;

    /**
     * AttributesController constructor.
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
        return $this->view('index');
    }

    /**
     * @param Datatables $datatables
     *
     * @return mixed
     */
    public function data(Datatables $datatables)
    {
        $query = AttributeGroupDescription::with('attributesGroup');

        return $datatables->eloquent($query)
            ->setTransformer(new AttributeGroupDescriptionDataTransformer())
            ->make(true);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $groupDescriptions = $this->groupDescriptionRepository->all()->pluck('name', 'id');
        $selector = buildSelect(route('admin::attribute_groups::get::json'),
            'attributes_group_id', false, [], []);

        return $this->view('create', compact('groupDescriptions', 'selector'));
    }

    /*TODO Create form request*/

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
            $groupDescription = $this->attributeGroupSystem->createDescription($data);
            \DB::commit();

            return redirect('admin/attributes');
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
            $groupDescriptions = $this->attributeGroupSystem->presentDescription($data, $id, ['attributesGroup']);

            return $this->view('show', compact('groupDescriptions'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        try {
            $data = $request->all();
            $groupDescription = $this->attributeGroupSystem->presentDescription($data, $id, ['attributesGroup']);
            $attributesList = $groupDescription->attributesGroup->pluck('name', 'id');
            $selector = buildSelect(route('admin::attribute_groups::get::json'),
                'attributes_group_id', false, $attributesList->toArray(), $attributesList->toArray());

            return $this->view('edit', compact('groupDescription', 'selector'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $exception) {
            return $this->redirectNotFound($exception);
        }
    }

    /*TODO Create form request*/

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
            $data = $request->all();
            $groupdescription = $this->attributeGroupSystem->updateDescription($data, $id);
            \DB::commit();

            return redirect('admin/attributes');
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();

            return $this->redirectNotFound($e);
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
            $deleted = $this->attributeGroupSystem->deleteDescription($id);
            if (!$deleted) {
                \Flash::warning('Item not deleted. Some error appeared!');
                \DB::rollBack();
            }
            \DB::commit();

            return redirect('admin/users');
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();

            return $this->redirectNotFound();
        } catch (\Throwable $exception) {
            \DB::rollBack();

            return $this->redirectNotFound($exception);
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
        $attrGroup = $this->groupDescriptionRepository->getModel()->where('name', 'like', $query)->select('name', 'id')->get();
        $attrGroupArr = [];
        foreach ($attrGroup as $key => $attrGroupItem) {
            $attrGroupArr[$key]['text'] = $attrGroupItem['name'];
            $attrGroupArr[$key]['id'] = $attrGroupItem['id'];
        }

        return \Response::json($attrGroupArr);
    }
}
