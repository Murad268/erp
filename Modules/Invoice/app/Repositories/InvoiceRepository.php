<?php

namespace Modules\Invoice\Repositories;

use Modules\Invoice\Models\Invoices;

class InvoiceRepository
{
    protected $model;

    public function __construct(Invoices $invoice)
    {
        $this->model = $invoice;
    }
    public function search($q, $perPage)
    {
        return $this->model->where('invoice_number', 'like', '%' . $q . '%')
            ->orWhere('seller_name', 'like', '%' . $q . '%')
            ->orWhere('buyer_name', 'like', '%' . $q . '%')
            ->orWhere('invoice_date', 'like', '%' . $q . '%')
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
        $invoice = $this->model->findOrFail($id);
        $invoice->update($data);
        return $invoice;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function delete($id)
    {
        $invoice = $this->model->findOrFail($id);
        return $invoice->delete();
    }

    public function findWhereInGet(array $data)
    {
        return $this->model::whereIn('id', $data)->get();
    }
}
