<?php
/**
 * 
 * @author: Shaun Hare
 * Date: 05/12/2013
 * Time: 08:04
 * 
 */

function callback() {
    $args = func_get_args();
    return $args;
}

class QueryParserTestCase extends AbstractTestCase{

    private $qp; // query parser object
    private $mockLogger;

    private $emptyInput;

    public function setUp()
    {

        $this->mockLogger = $this->getMock("Zend_Log",array("log"));
        $this->emptyInput =  array();
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfEmptyArrayPassedIn()
    {

        $this->qp = new Site_Model_QueryParser($this->emptyInput);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testLoggerCalledWhenExceptionThrowONEmptyInput()
    {
        $this->qp = new Site_Model_QueryParser($this->emptyInput);
        $this->mockLogger->expects($this->once())
            ->method('log');



    }

    /**
     * @dataProvider basicSearchArray
     * @param $data
     */
    public function testextractSearchFieldsPopulatesSearchCriteriaWithOnlyFieldsWithSearchPrefix($data)
    {
        $this->qp = new Site_Model_QueryParser($data);

        foreach($this->qp->getSearchCriteria() as $field=>$value)
        {

            $this->assertRegExp('/^search/', $field);
        }

    }

    /**
     * @dataProvider noSearchArray
     * @param $data
     */
    public function testextractSearchFieldsreturnsEmptyArrayWhenNoSearchFields($data)
    {
        $this->qp = new Site_Model_QueryParser($data);

        foreach($this->qp->getSearchCriteria() as $field=>$value)
        {

            $this->assertRegExp('/!^search/', $field);
        }

    }

    /**
     * @dataProvider basicSearchArray
     * @param $data
     */
    public function  testHasConcatenatorTrueIfPresent($data)
    {
        $this->qp = new Site_Model_QueryParser($data);
        $this->assertInternalType('array',$this->qp->hasConcatenators());
        $this->assertGreaterThanOrEqual(count($this->qp->hasConcatenators()),1);

    }

    /**
     * @dataProvider basicSearchArray
     * @param $data
     */
    public function testMultipleFieldsReturnsTrueWhenMoreThanOne($data)
    {
        $this->qp = new Site_Model_QueryParser($data);
        $this->assertTrue($this->qp->hasMultipleSearchFields());
    }


    /**
     * @dataProvider noSearchArray
     * @param $data
     */
    public function testMultipleFieldsReturnsFalseWhenNoFields($data)
    {

        $this->qp = new Site_Model_QueryParser($data);
        $this->assertFalse($this->qp->hasMultipleSearchFields());
    }

    /**
     * @dataProvider oneSearchArray
     * @param $data
     */
    public function testMultipleFieldsReturnsFalseWhenOnlyOneFields($data)
    {
        $this->qp = new Site_Model_QueryParser($data);
        $this->assertFalse($this->qp->hasMultipleSearchFields());
    }


    /**
     * @dataProvider noSearchArray
     * @expectedException InvalidArgumentException
     * @param $data
     */
    public function testParseThrowsExceptionWithNoSearchData($data)
    {

        $solrInterface = $this->getMock("Site_Model_SolrInterface",array('getHelper'),array(),'SolrInterface',false,false,false);
        $this->qp = new Site_Model_QueryParser($data);

        $solrInterface->expects($this->once())
            ->method('getHelper')
            ->will($this->returnValue(new StubHelper()));

        $this->qp->parse($solrInterface);




    }


    /**
     * @dataProvider basicSearchArray
     *
     * @param $data
     */
    public function testParseCallsQueryBuilderAppropriateNumberofTimes($data)
    {

        $solrInterface = $this->getMock("Site_Model_SolrInterface",array('getHelper','_fieldQueryBuilder'),array(),'SolrInterface',false,false,false);
        $this->qp = new Site_Model_QueryParser($data);

        $solrInterface->expects($this->once())
            ->method('getHelper')
            ->will($this->returnValue(new StubHelper()));

        $solrInterface->expects($this->exactly(2))
            ->method('_fieldQueryBuilder')
           ->with($this->anything())
            ->will($this->returnValue("String"));


            $actual =  $this->qp->parse($solrInterface);




    }


    public function testQueryBuilder()
    {
        $solrInterface = $this->getMock("Site_Model_SolrInterface",array('getHelper','_fieldQueryBuilder'),array(),'SolrInterface',false,false,false);

        $mockFactory = $this->getMock('Factory_GenericFactory',array('load'));
        $mockRequest = array();
        $solrInterface = new Site_Model_SolrInterface($mockRequest, $mockFactory);

    }

    public function  basicSearchArray()
    {
        $data = unserialize('a:8:{s:1:"q";s:5:"debug";s:6:"module";s:4:"site";s:10:"controller";s:6:"search";s:6:"action";s:6:"search";s:11:"searchField";a:2:{i:0;s:10:"place-name";i:1;s:10:"place-name";}s:14:"searchOperator";a:2:{i:0;s:8:"contains";i:1;s:15:"Choose operator";}s:10:"searchTerm";a:2:{i:0;s:0:"";i:1;s:0:"";}s:18:"searchConcatenator";a:1:{i:0;s:3:"and";}}');
        return array(array($data));
    }

    public function  oneSearchArray()
    {
        $data = unserialize('a:7:{s:1:"q";s:5:"debug";s:6:"module";s:4:"site";s:10:"controller";s:6:"search";s:6:"action";s:6:"search";s:11:"searchField";a:1:{i:0;s:10:"place-name";}s:14:"searchOperator";a:1:{i:0;s:8:"contains";}s:10:"searchTerm";a:1:{i:0;s:0:"";}}');
        return array(array($data));
    }
    public function noSearchArray()
    {
        $data = unserialize('a:4:{s:1:"q";s:5:"debug";s:6:"module";s:4:"site";s:10:"controller";s:6:"search";s:6:"action";s:6:"search";}');
        return array(array($data));
    }


}


