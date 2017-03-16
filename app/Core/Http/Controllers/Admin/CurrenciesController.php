<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Models\Currency;
use App\Core\Repositories\CurrencyRepository;
use App\Core\Transformers\CurrenciesDataTransformer;
use App\Core\Validators\Currencies\StoreCurrenciesRequest;
use App\Core\Validators\Currencies\UpdateCurrenciesRequest;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

/**
 * Class CurrenciesController.
 */
class CurrenciesController extends BaseController
{
    public $viewPathBase = 'admin.settings.currencies.';
    public $errorRedirectPath = 'admin::settings::currency::index';

    /**
     * @var CurrencyRepository
     */
    private $repository;

    /**
     * @param CurrencyRepository $repository
     */
    public function __construct(CurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of Currency.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $currencies = $this->repository->all();

        return $this->view('index', compact('currencies'));
    }

    /**
     * @param Datatables $datatables
     *
     * @return mixed
     */
    public function data(Datatables $datatables)
    {
        $query = Currency::select('currencies.*');

        return $datatables->eloquent($query)
            ->setTransformer(new CurrenciesDataTransformer())
            ->make(true);
    }

    /**
     * Show the form for creating new Currency.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('create');
    }

    /**
     * Store a newly created Currency in storage.
     *
     * @param StoreCurrenciesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCurrenciesRequest $request)
    {
        $data = $request->except(['method', '_token']);
        if (!isset($data['main'])) {
            $data['main'] = 0;
        }
        $this->repository->create($data);

        return redirect()->route('admin::settings::currency::index');
    }

    /**
     * Show the form for editing Currency.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $currency = $this->repository->findOrFail($id);

        return $this->view('edit', compact('currency'));
    }

    /**
     * Update Currency in storage.
     *
     * @param UpdateCurrenciesRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCurrenciesRequest $request, $id)
    {
        $currency = $this->repository->findOrFail($id);
        if ($request->main == 1 && $request->main_old == 0) {
            $currency_old_main = $this->repository->where('main', '=', 1)->first();
            if ($currency_old_main) {
                $currency_old_main->main = 0;
                $currency_old_main->save();
            }
        }
        if (!$request->main) {
            $request->request->add(['main' => 0]);
        }
        $currency->update($request->except(['method', '_token']));

        return redirect()->route('admin::settings::currency::index');
    }

    /**
     * Remove Currency from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = $this->repository->findOrFail($id);
        $currency->delete();
        $currency_old_main = $this->repository->where('main', '=', 1)->first();
        if (empty($currency_old_main)) {
            $newCurrency = $this->repository->first();
            if (!empty($newCurrency)) {
                $newCurrency->main = true;
                $newCurrency->save();
            }
        }

        return redirect()->route('admin::settings::currency::index');
    }
}
