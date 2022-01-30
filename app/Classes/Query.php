<?php

namespace app\Classes;


use Aigletter\Interfaces\Builder\QueryBuilderInterface;
use Aigletter\Interfaces\Builder\QueryInterface;


class Query implements QueryInterface
{
    protected $table;
    protected $where = [];
    protected $select = [];
    protected $order = [];
    protected $limit;
    protected $offset;

    public function __construct(QueryBuilderInterface $queryBuilder)
    {
        $this->select = $queryBuilder->getSelect();
        $this->table = $queryBuilder->getTable();
        $this->where = $queryBuilder->getWhere();
        $this->order = $queryBuilder->getOrder();
        $this->limit = $queryBuilder->getLimit();
        $this->offset = $queryBuilder->getOffset();
    }


    public function toSql(): string
    {
        $where = $this->where === [] ? '' : ' WHERE ' . implode(' AND ', $this->where)
            . ' ORDER BY ' . implode(',  ', $this->order) . ' LIMIT ' . $this->limit . ' OFFSET ' . $this->offset;
        return 'SELECT ' . implode(', ', $this->select)
            . ' FROM ' . $this->table
            . $where;

    }


}