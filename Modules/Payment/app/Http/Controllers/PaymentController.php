<?php

namespace Modules\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Payment\Http\Requests\PaymentRequest;
use Modules\Payment\Repositories\PaymentRepository;

class PaymentController extends Controller
{
    protected $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        if ($q) {
            $items = $this->paymentRepository->search($q, $perPage);
        } else {
            $items = $this->paymentRepository->paginate($perPage);
        }

        return view('payment::index', compact('items', 'q'));
    }

    public function create()
    {
        return view('payment::create');
    }

    public function store(PaymentRequest $request)
    {
        try {
            $data = $request->all();
            $this->paymentRepository->create($data);
            return redirect()->route('payment.index')->with('status', 'Ödəniş uğurla yaradıldı.');
        } catch (\Exception $e) {
            return redirect()->route('payment.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $payment = $this->paymentRepository->find($id);
        return view('payment::edit', compact('payment'));
    }

    public function update(PaymentRequest $request, $id)
    {
        try {
            $data = $request->all();
            $this->paymentRepository->update($id, $data);
            return redirect()->route('payment.index')->with('status', 'Ödəniş uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->route('payment.index')->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }



    public function delete_selected_items(Request $request)
    {
        try {
            $models = $this->paymentRepository->findWhereInGet($request->ids);
            foreach ($models as $model) {
                $model->delete();
            }
            return response()->json(['success' => true, 'message' => 'Seçilən ödənişlər uğurla silindi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
