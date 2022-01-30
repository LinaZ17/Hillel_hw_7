<?php
namespace app\Classes;

use Aigletter\Interfaces\Builder\QueryBuilderInterface;
use Aigletter\Interfaces\Builder\QueryInterface;


class QueryBuilder implements QueryBuilderInterface
{
    protected $table;
    protected $where = [];
    protected $select = [];
    protected $order = [];
    protected $limit;
    protected $offset;


    public function select($columns): self
    {
        $this->select = $columns;

        return $this;
    }


    public function table($table): self
    {
        $this->table = $table;

        return $this;
    }

    public function where($conditions): self
    {
        $this->where = $conditions;

        return $this;
    }

    public function order($order): self
    {
        $this->order = $order;

        return $this;
    }

    public function limit($limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function offset($offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getSelect(): array
    {
        return $this->select;
    }

    public function getWhere(): array
    {
        return $this->where;
    }

    public function getOrder(): array
    {
        return $this->order;

    }

    public function getLimit()
    {
        return $this->limit;

    }

    public function getOffset()
    {
        return $this->offset;
    }


    public function build(): QueryInterface
    {
        return new \app\Classes\Query($this);
    }


}

