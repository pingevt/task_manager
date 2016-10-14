<?php

/**
 * @file
 * Contains Drupal\github_connect\Controller\GitHubPages.
 */

namespace Drupal\github_connect\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Drupal\github_connect\GitHubConnect;


/**
 * Class GitHubPages.
 *
 * @package Drupal\github_connect\Controller
 */
class GitHubPages extends ControllerBase {

	function testPage() {
		$build = array('#markup' => '<h1>Projects</h1>');

		$conn = new GitHubConnect();

		$projects = $conn->getProjects();
kint($projects);
		foreach ($projects as $project) {
			$build['projects'][] = array('#markup' => '<p>' . $project->getFullName() . '::' . $project->getID() . '</p>');
		}

		return $build;
	}

}
