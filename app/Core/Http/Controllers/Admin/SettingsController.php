<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Models\Settings;
use App\Core\Repositories\SettingsRepository;
use Illuminate\Http\Request;

/**
 * Class SettingsController
 * @package App\Core\Http\Controllers\Admin
 */
class SettingsController extends BaseController
{

    //TODO implement error handling
    public $viewPathBase = 'admin.settings.';
    public $errorRedirectPath = 'admin::settings::index';

    /**
     * @var SettingsRepository
     */
    protected $settings;

    /**
     * SettingsController constructor.
     * @param SettingsRepository $settings
     */
    public function __construct(SettingsRepository $settings)
    {
        $this->settings = $settings;
        $this->middleware(['role:Admin']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $settings = $this->settings->order('order', 'ASC')->model->get();

        return $this->view('index', compact('settings'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return $this->view('create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $lastSetting = $this->settings->order('order', 'DESC')->first();

        if (is_null($lastSetting)) {
            $order = 0;
        } else {
            $order = intval($lastSetting->order) + 1;
        }

        $request->merge(['order' => $order]);

        $this->settings->create($request->all());
        $this->flash('success', 'Successfully Created Settings');

        return redirect()->to(route('admin::settings::index'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $setting = $this->settings->find($id);
        $setting->value = $request->setting;
        $setting->save();
        $this->flash('success', "Successfully Saved Setting - {$setting->key}");

        return redirect()->to(route('admin::settings::index'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->settings->delete($id);
        $this->flash('success', 'Successfully Deleted Setting');

        return redirect()->to(route('admin::settings::index'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function move_up($id)
    {
        $setting = $this->settings->find($id);
        $swapOrder = $setting->order;
        $previousSetting = $this->settings->order('order', 'DESC')->model->where('order', '<', $swapOrder)->first();

        $message = "This is already at the top of the list";
        $type = 'error';
        if (isset($previousSetting->order)) {
            $setting->order = $previousSetting->order;
            $setting->save();
            $previousSetting->order = $swapOrder;
            $previousSetting->save();

            $message = "Moved <b>{$setting->key}</b> setting order up";
            $type = 'success';
        }
        $this->flash($type, $message);

        return redirect()->to(route('admin::settings::index'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_value($id)
    {
        $setting = $this->settings->find($id);
        $key = $setting->key;
        if (isset($setting->id)) {
            $setting->value = '';
            $setting->save();
        }

        $message = "Successfully removed <b>{$key}</b> value";
        $type = 'success';
        $this->flash($type, $message);

        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function move_down($id)
    {
        $setting = $this->settings->find($id);
        $swapOrder = $setting->order;
        $key = $setting->key;

        $previousSetting = $this->settings->order('order', 'ASC')->model->where('order', '>', $swapOrder)->first();
        $message = 'This is already at the bottom of the list';
        $type = 'error';


        if (isset($previousSetting->order)) {
            $setting->order = $previousSetting->order;
            $setting->save();
            $previousSetting->order = $swapOrder;
            $previousSetting->save();

            $message = "Moved <b>{$key}</b> setting order down";
            $type = 'success';
        }
        $this->flash($type, $message);

        return redirect()->to(route('admin::settings::index'));
    }
}
