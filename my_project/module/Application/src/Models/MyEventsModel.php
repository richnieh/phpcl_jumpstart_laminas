<?php
namespace Application\Models;

use Laminas\Db\Sql\Where;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\Adapter\AdapterInterface;

class MyEventsModel
{
    const TABLE_NAME = 'events';
    protected $tableGateway = NULL;
    public function __construct(AdapterInterface $adapter)
    {
        $this->tableGateway = new TableGateway(self::TABLE_NAME, $adapter);
    }
    public function findEventsByYear(int $year)
    {
        $where = new Where();
        $where->like('event_date', $year.'%');
        return $this->tableGateway->select($where);
    }
}
