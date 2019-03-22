<?php

namespace Drupal\staff_profile_sync\Commands;

use Consolidation\OutputFormatters\StructuredData\RowsOfFields;
use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 *
 */
class StaffProfileSyncCommands extends DrushCommands {

  /**
   * Sync drupal entities
   * @usage staff_profile_sync-commandName sync-profiles
   *  Used to sync staff profile entities.
   *
   * @command staff_profile_sync:sync
   * @aliases staff-sync
   */
  public function syncProfiles() {
    drush_print("Staff Profile Sync Started");
    staff_profile_sync_updater();
    drush_print("Staff Profile Sync Finished");
  }
}
