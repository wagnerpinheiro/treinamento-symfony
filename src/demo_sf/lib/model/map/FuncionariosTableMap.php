<?php


/**
 * This class defines the structure of the 'funcionarios' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class FuncionariosTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.FuncionariosTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('funcionarios');
		$this->setPhpName('Funcionarios');
		$this->setClassname('Funcionarios');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', false, 120, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 120, null);
		$this->addForeignKey('DEPARTAMENTO_ID', 'DepartamentoId', 'INTEGER', 'departamentos', 'ID', false, 11, null);
		$this->addColumn('NASCIMENTO', 'Nascimento', 'DATE', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Departamentos', 'Departamentos', RelationMap::MANY_TO_ONE, array('departamento_id' => 'id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // FuncionariosTableMap
