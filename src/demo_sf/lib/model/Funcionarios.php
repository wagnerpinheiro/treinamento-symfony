<?php


/**
 * Skeleton subclass for representing a row from the 'funcionarios' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Funcionarios extends BaseFuncionarios {
    
    public function setEmail($v) {
        if(!preg_match('/.*@.*/', $v)){
            throw new PropelException('Email Inválido');
        }
        parent::setEmail($v);
    }

} // Funcionarios
