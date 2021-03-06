<?php

/**
 * @file
 * Contains Drupal\my_custom_migrate\Plugin\migrate\source\Company
 */

namespace Drupal\my_custom_migrate\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
// use Drupal\migrate\Row;

/**
 * Source plugin for Companies.
 *
 * @MigrateSource(
 *   id = "company"
 * )
 */
class Company extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('company', 'c')
      ->fields('c', array(
        'id',
        'name',
        'description',
        'phone',
        'email',
        'website',
      ));
      // debug only : optionally limit to rows to be imported
      //))->range(0,10);
    return $query;
  }

//  // Debug only.
//  // If you uncomment this, also uncomment the
//  // use Drupal\migrate\Row; declaration
//  // at the top of the file
//  public function prepareRow(Row $row) {
//    drush_print_r($row);
//    return parent::prepareRow($row);
//  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = array(
      'id' => $this->t('Autoincrement ID'),
      'name' => $this->t('Company name'),
      'description' => $this->t('HTML content'),
      'phone' => $this->t('Telephone number'),
      'email' => $this->t('Email address'),
      'website' => $this->t('Website URL'),
    );
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'c',
      ],
    ];
  }
}
