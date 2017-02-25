<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\AttributeGroupSystemContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class AttributesController
 * @package App\Core\Http\Controllers\Admin
 */
class AttributesController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = "admin.attributes.";
    /**
     * @var string
     */
    public $errorRedirectPath = "admin/attributes";

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
        $groupDescriptions = $this->attributeGroupSystem->presentDescription($data, null, ['attributesGroup']);
        $no = $groupDescriptions->firstItem();

        return $this->view('index', compact('groupDescriptions', 'no'));
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $groupDescription = $this->attributeGroupSystem->createDescription($data);
            return redirect('admin/attributes');
        } catch (\Throwable $exception) {
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
            $groupDescriptions = $this->attributeGroupSystem->presentDescription($data, $id, ['attributesGroup']);
            return $this->view('show', compact('groupDescriptions'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        try {
            $data = $request->all();
            $groupDescription = $this->attributeGroupSystem->presentDescription($data, $id, ['attributesGroup']);
            $attributesList = $groupDescription->attributesGroup->pluck("name", "id");
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
     * @return Response|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $groupdescription = $this->attributeGroupSystem->updateDescription($data, $id);
            return redirect('admin/attributes');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
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
            $deleted = $this->attributeGroupSystem->deleteDescription($id);
            if (!$deleted) {
                \Flash::warning("Item not deleted. Some error appeared!");
            }
            return redirect('admin/users');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        } catch (\Throwable $exception) {
            return $this->redirectNotFound($exception);
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
        $attrGroup = $this->groupDescriptionRepository->getModel()->where("name", "like", $query)->select('name', 'id')->get();
        $attrGroupArr = [];
        foreach ($attrGroup as $key => $attrGroupItem) {
            $attrGroupArr[$key]['text'] = $attrGroupItem['name'];
            $attrGroupArr[$key]['id'] = $attrGroupItem['id'];
        }
        return \Response::json($attrGroupArr);
    }
}
