<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('abc', 'Home::index');
$routes->get('home', 'Home::home');
$routes->get('about', 'Home::about');

// Subject Dashboard Routes
$routes->get("teacher/home", "UITeacherController::index");
$routes->post("subject/add", "SubjectController::index");
$routes->post('subject/view', "SubjectController::subjectTable");
$routes->post('subject/view/row', "SubjectController::subject_row");
$routes->post('subject/delete', "SubjectController::subject_delete");
$routes->post('subject/update', "SubjectController::subject_update");

// Student Dashboard Routes
$routes->get("student/home", "UIStudentController::index");
$routes->post("student/add", "StudentController::index");
$routes->post('student/view', "StudentController::studentTable");
$routes->post('student/view/row', "StudentController::student_row");
$routes->post('student/delete', "StudentController::student_delete");
$routes->post('student/update', "StudentController::student_update");


