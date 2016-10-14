<?php

namespace Drupal\github_connect;

class GitHubConnect {
	protected $client;

	function __construct() {
		$this->setClient();
	}

	protected function setClient() {
		require_once(__DIR__ . '/../github-client/client/GitHubClient.php');

		$this->client = new \GitHubClient();
		$this->authenticate();
	}

	protected function setDebug() {
		$this->client->setDebug(TRUE);
	}

	public function authenticate() {
		$user = \Drupal::currentUser();

		$this->client->setAuthType('Oauth');
		$this->client->setOauthToken('9de36862f04beba8d4711e22c561ff882ef18223');
	}

	public function getProjects() {
		return $this->client->repos->listYourRepositories();
	}

	public function getProject($owner, $repo_id) {
		return $this->client->repos->get($owner, $repo_id);
	}

}
