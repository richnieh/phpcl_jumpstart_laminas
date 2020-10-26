<?php
namespace Hotels\Models;

use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\Adapter\AdapterInterface;

class HotelsModel
{
    const TABLE_NAME = 'hotels';
    protected $tableGateway = NULL;
    public function __construct(AdapterInterface $adapter)
    {
        $this->tableGateway = new TableGateway(self::TABLE_NAME, $adapter);
    }
    public function findByCountry(string $countryCode)
    {
        return $this->tableGateway->select(['country'=>$countryCode]);
    }
}