# Staff Profile Sync
Drupal 8 module to sync staff profile entities with data found in a central database

## Updating Staff Profiles
Staff profiles are created and/or updated in the following circumstances:
* The site's chron is run once a day
* An admin sets the sync to run on the next chron through config > system > Staff Profile Sync Settings and the site's chron is run
* An admin runs sync manually through config > system > Staff Profile Sync Settings
* The Drush command sync-profiles is invoked
* Individual profiles will be updated when a user is added with the same username or a new entity will be created if no entity with that username exists
* The function staff_profile_sync_updater() is called in your custom code

When the sync runs from the staff_profile_sync_updater() function, all entities not found in the secondary database will be marked as unpublished, all entities found will be updated and all data that lacks an associated entity will have entities created.

## Note
This Addon requires authentication from the staff database and smugmug.
The staff database connection requires credentials, the database name and database url.
The SmugMug API connection requires the node unlock password and API key.

## Prerequisites
 - staff_profile module
 - encrypt and key modules
