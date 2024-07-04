<?php

namespace Modules\Payment\Repositories;

use Modules\Payment\Models\Payment;

class PaymentRepository
{
    protected $model;

    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }

    public function search($q, $perPage)
    {
        return $this->model->where('payment_number', 'like', '%' . $q . '%')
            ->orWhere('payer_name', 'like', '%' . $q . '%')
            ->orWhere('receiver_name', 'like', '%' . $q . '%')
            ->orWhere('payment_date', 'like', '%' . $q . '%')
            ->paginate($perPage);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate($perPage)
    {
        return $this->model->paginate($perPage);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $payment = $this->model->findOrFail($id);
        $payment->update($data);
        return $payment;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function delete($id)
    {
        $payment = $this->model->findOrFail($id);
        return $payment->delete();
    }

    public function findWhereInGet(array $data)
    {
        return $this->model::whereIn('id', $data)->get();
    }
}
