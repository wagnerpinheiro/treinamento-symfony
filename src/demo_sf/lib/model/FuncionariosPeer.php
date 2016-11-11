<?php


/**
 * Skeleton subclass for performing query and update operations on the 'funcionarios' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class FuncionariosPeer extends BaseFuncionariosPeer {
    
    public static function doListFuncionarios(\Criteria $criteria = null, \PropelPDO $con = null) {
        if($criteria){
            $c = clone $criteria;
        }else{
            $c = new Criteria(self::TABLE_NAME);
        }
        
        $c->addJoin(DepartamentosPeer::ID, FuncionariosPeer::DEPARTAMENTO_ID);
        $c->add(FuncionariosPeer::NOME, null, Criteria::ISNOTNULL);
        $c->addAscendingOrderByColumn(FuncionariosPeer::NOME);
        
        return self::doSelect($c, $con);        
    }

} // FuncionariosPeer
