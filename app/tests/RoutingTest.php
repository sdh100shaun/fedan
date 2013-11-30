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
        $crawler = $this->client->request('GET', '/users');

        $this->assertTrue($this->client->getResponse()->isOk());
    }


}