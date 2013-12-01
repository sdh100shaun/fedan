<?php

class RoutingTest extends TestCase {

	/**
	 * A basic functional routing test setup
	 * @author shaunhare
	 * @return void
	 */
	public function testBaseRoute()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
    public function testUserRoute()
    {
        $crawler = $this->client->request('GET', '/users/login');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testFeedbackRoute()
    {
        $crawler = $this->client->request('GET', '/feedback/test');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testFeedbackPostOK()
    {
        $crawler = $this->client->request('post', '/feedback/feedback');
        $this->assertTrue($this->client->getResponse()->isOk());
    }
    public function testFeedbackErrorRoute()
    {
        $crawler = $this->client->request('GET', '/feedback/errors');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testFeedbackFormRoute()
    {
        $crawler = $this->client->request('GET', '/feedback/showForm');

        $this->assertTrue($this->client->getResponse()->isOk());
    }


}