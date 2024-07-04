<?php

namespace Modules\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Payment\Http\Requests\PaymentRequest;
use Modules\Payment\Repositories\PaymentRepository;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentRepository $paymentRepository
    ) {}

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        $items = $q
            ? $this->paymentRepository->search($q, $perPage)
            : $this->paymentRepository->paginate($perPage);

        return view('payment::index', compact('items', 'q'));
    }

    public function create()
    {
        return view('payment::create');
    }

    public function store(PaymentRequest $request)
    {
        return $this->executeSafely(function() use ($request) {
            $data = $request->all();
            $this->paymentRepository->create($data);
            return redirect()->route('payment.index')->with('status', 'Ödəniş uğurla yaradıldı.');
        }, 'payment.index');
    }

    public function edit($id)
    {
        $payment = $this->paymentRepository->find($id);
        return view('payment::edit', compact('payment'));
    }

    public function update(PaymentRequest $request, $id)
    {
        return $this->executeSafely(function() use ($request, $id) {
            $data = $request->all();
            $this->paymentRepository->update($id, $data);
            return redirect()->route('payment.index')->with('status', 'Ödəniş uğurla yeniləndi.');
        }, 'payment.index');
    }

    public function delete_selected_items(Request $request)
    {

        return $this->executeSafely(function() use ($request) {
            $models = $this->paymentRepository->findWhereInGet($request->ids);
            foreach ($models as $model) {
                $model->delete();
            }
            return response()->json(['success' => true, 'message' => 'Seçilən ödənişlər uğurla silindi.']);
        });
    }
}
