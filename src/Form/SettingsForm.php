<?php

namespace Drupal\staff_profile_sync\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/*
 * Class SettingsForm
 */
class SettingsForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
   protected function getEditableConfigNames() {
     return [
       'staff_profile_sync.settings',
     ];
   }

   /**
    * {@inheritdoc}
    */
    public function getFormID() {
      return 'settings_form';
    }

    /**
     * {@inheritdoc}
     */
     public function buildForm(array $form, FormStateInterface $form_state) {
       $config = $this->config('staff_profile_sync.settings');
       $site_vars = \Drupal::config('system.site');

      $form['run_on_save'] = [
        '#type' => 'checkbox',
        '#title' => t('Run sync on form Submit'),
        '#default_value' => false,
        '#description' => t('Check this and save the settings to run profile sync')
      ];
      $form['last_run'] = [
        '#markup' => 'Last Updated on: ' + $config->get('staff_profile_sync_last'),
      ];
      $form['note'] = [
        '#markup' => 'Updating the database login and address must be done in the settings.php'
      ];

      return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
      parent::validateForm($form, $form_state);
    }

    /**
     * {@inheritdoc
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
      parent::submitForm($form, $form_state);
      //If checked, run sync
      if ($form_state->getValue('run_on_save')) {
        staff_profile_sync_updater();
      }
  }
}
