# Details

Date : 2025-03-27 20:45:24

Directory u:\\Projects\\Laravel Projects\\URLShortener

Total : 101 files,  14633 codes, 1183 comments, 715 blanks, all 16531 lines

[Summary](results.md) / Details / [Diff Summary](diff.md) / [Diff Details](diff-details.md)

## Files
| filename | language | code | comment | blank | total |
| :--- | :--- | ---: | ---: | ---: | ---: |
| [.dockerignore](/.dockerignore) | Ignore | 29 | 5 | 2 | 36 |
| [Dockerfile](/Dockerfile) | Docker | 11 | 56 | 14 | 81 |
| [README.Docker.md](/README.Docker.md) | Markdown | 15 | 0 | 7 | 22 |
| [README.md](/README.md) | Markdown | 45 | 0 | 22 | 67 |
| [app/Helpers/base62file.php](/app/Helpers/base62file.php) | PHP | 35 | 12 | 8 | 55 |
| [app/Http/Controllers/AdminController.php](/app/Http/Controllers/AdminController.php) | PHP | 65 | 1 | 6 | 72 |
| [app/Http/Controllers/Controller.php](/app/Http/Controllers/Controller.php) | PHP | 5 | 1 | 3 | 9 |
| [app/Http/Controllers/InitialController.php](/app/Http/Controllers/InitialController.php) | PHP | 64 | 7 | 12 | 83 |
| [app/Http/Controllers/PremiumController.php](/app/Http/Controllers/PremiumController.php) | PHP | 32 | 1 | 5 | 38 |
| [app/Http/Controllers/ProfileController.php](/app/Http/Controllers/ProfileController.php) | PHP | 93 | 24 | 18 | 135 |
| [app/Http/Controllers/urlController.php](/app/Http/Controllers/urlController.php) | PHP | 147 | 12 | 18 | 177 |
| [app/Http/Middleware/MustBeLoggedIn.php](/app/Http/Middleware/MustBeLoggedIn.php) | PHP | 15 | 5 | 4 | 24 |
| [app/Http/Middleware/mustBeAdmin.php](/app/Http/Middleware/mustBeAdmin.php) | PHP | 12 | 5 | 4 | 21 |
| [app/Jobs/SendDailyAdminEmail.php](/app/Jobs/SendDailyAdminEmail.php) | PHP | 14 | 8 | 6 | 28 |
| [app/Jobs/SendNewURLEmail.php](/app/Jobs/SendNewURLEmail.php) | PHP | 23 | 8 | 5 | 36 |
| [app/Jobs/SendNewUserEmail.php](/app/Jobs/SendNewUserEmail.php) | PHP | 21 | 8 | 5 | 34 |
| [app/Livewire/AdminPanelGuestTable.php](/app/Livewire/AdminPanelGuestTable.php) | PHP | 14 | 0 | 5 | 19 |
| [app/Livewire/AdminPanelURLTable.php](/app/Livewire/AdminPanelURLTable.php) | PHP | 14 | 0 | 5 | 19 |
| [app/Livewire/AdminUsersTable.php](/app/Livewire/AdminUsersTable.php) | PHP | 14 | 0 | 5 | 19 |
| [app/Livewire/Search.php](/app/Livewire/Search.php) | PHP | 26 | 0 | 4 | 30 |
| [app/Livewire/SummaryStats.php](/app/Livewire/SummaryStats.php) | PHP | 18 | 0 | 4 | 22 |
| [app/Mail/DailyAdminEmail.php](/app/Mail/DailyAdminEmail.php) | PHP | 40 | 15 | 8 | 63 |
| [app/Mail/NewURLEmail.php](/app/Mail/NewURLEmail.php) | PHP | 36 | 15 | 8 | 59 |
| [app/Mail/NewUserEmail.php](/app/Mail/NewUserEmail.php) | PHP | 32 | 15 | 9 | 56 |
| [app/Models/GuestShortURLS.php](/app/Models/GuestShortURLS.php) | PHP | 11 | 1 | 5 | 17 |
| [app/Models/User.php](/app/Models/User.php) | PHP | 35 | 17 | 9 | 61 |
| [app/Models/shortenedURLs.php](/app/Models/shortenedURLs.php) | PHP | 26 | 1 | 8 | 35 |
| [app/Policies/UserPolicy.php](/app/Policies/UserPolicy.php) | PHP | 44 | 21 | 10 | 75 |
| [app/Providers/AppServiceProvider.php](/app/Providers/AppServiceProvider.php) | PHP | 19 | 8 | 5 | 32 |
| [bootstrap/app.php](/bootstrap/app.php) | PHP | 17 | 2 | 3 | 22 |
| [bootstrap/providers.php](/bootstrap/providers.php) | PHP | 4 | 0 | 2 | 6 |
| [compose.yaml](/compose.yaml) | YAML | 6 | 40 | 4 | 50 |
| [composer.json](/composer.json) | JSON | 76 | 0 | 1 | 77 |
| [composer.lock](/composer.lock) | JSON | 8,502 | 0 | 1 | 8,503 |
| [config/app.php](/config/app.php) | PHP | 22 | 82 | 23 | 127 |
| [config/auth.php](/config/auth.php) | PHP | 28 | 74 | 14 | 116 |
| [config/cache.php](/config/cache.php) | PHP | 57 | 34 | 18 | 109 |
| [config/database.php](/config/database.php) | PHP | 109 | 43 | 23 | 175 |
| [config/filesystems.php](/config/filesystems.php) | PHP | 36 | 32 | 13 | 81 |
| [config/logging.php](/config/logging.php) | PHP | 79 | 33 | 21 | 133 |
| [config/mail.php](/config/mail.php) | PHP | 55 | 43 | 19 | 117 |
| [config/queue.php](/config/queue.php) | PHP | 52 | 44 | 17 | 113 |
| [config/sanctum.php](/config/sanctum.php) | PHP | 17 | 53 | 14 | 84 |
| [config/scout.php](/config/scout.php) | PHP | 50 | 137 | 23 | 210 |
| [config/services.php](/config/services.php) | PHP | 20 | 11 | 8 | 39 |
| [config/session.php](/config/session.php) | PHP | 23 | 160 | 35 | 218 |
| [database/factories/UserFactory.php](/database/factories/UserFactory.php) | PHP | 25 | 14 | 6 | 45 |
| [database/migrations/0001\_01\_01\_000000\_create\_users\_table.php](/database/migrations/0001_01_01_000000_create_users_table.php) | PHP | 37 | 6 | 6 | 49 |
| [database/migrations/0001\_01\_01\_000001\_create\_cache\_table.php](/database/migrations/0001_01_01_000001_create_cache_table.php) | PHP | 25 | 6 | 5 | 36 |
| [database/migrations/0001\_01\_01\_000002\_create\_jobs\_table.php](/database/migrations/0001_01_01_000002_create_jobs_table.php) | PHP | 46 | 6 | 6 | 58 |
| [database/migrations/2025\_03\_05\_032009\_create\_shortened\_u\_r\_ls\_table.php](/database/migrations/2025_03_05_032009_create_shortened_u_r_ls_table.php) | PHP | 20 | 6 | 4 | 30 |
| [database/migrations/2025\_03\_09\_052818\_add\_is\_\_premium\_to\_users.php](/database/migrations/2025_03_09_052818_add_is__premium_to_users.php) | PHP | 21 | 8 | 4 | 33 |
| [database/migrations/2025\_03\_09\_173558\_add\_premium\_features\_to\_urls.php](/database/migrations/2025_03_09_173558_add_premium_features_to_urls.php) | PHP | 25 | 8 | 4 | 37 |
| [database/migrations/2025\_03\_10\_002623\_create\_guest\_short\_u\_r\_ls\_table.php](/database/migrations/2025_03_10_002623_create_guest_short_u_r_ls_table.php) | PHP | 23 | 6 | 4 | 33 |
| [database/migrations/2025\_03\_10\_165923\_remove\_unique\_constraint\_from\_shortened\_u\_r\_ls.php](/database/migrations/2025_03_10_165923_remove_unique_constraint_from_shortened_u_r_ls.php) | PHP | 19 | 9 | 4 | 32 |
| [database/migrations/2025\_03\_13\_194813\_add\_avatar\_to\_users\_table.php](/database/migrations/2025_03_13_194813_add_avatar_to_users_table.php) | PHP | 19 | 8 | 4 | 31 |
| [database/migrations/2025\_03\_27\_213202\_create\_personal\_access\_tokens\_table.php](/database/migrations/2025_03_27_213202_create_personal_access_tokens_table.php) | PHP | 24 | 6 | 4 | 34 |
| [database/seeders/DatabaseSeeder.php](/database/seeders/DatabaseSeeder.php) | PHP | 14 | 5 | 5 | 24 |
| [package-lock.json](/package-lock.json) | JSON | 2,168 | 0 | 1 | 2,169 |
| [package.json](/package.json) | JSON | 19 | 0 | 1 | 20 |
| [phpunit.xml](/phpunit.xml) | XML | 31 | 2 | 1 | 34 |
| [public/build/assets/app-C0GD\_Dol.js](/public/build/assets/app-C0GD_Dol.js) | JavaScript | 7 | 0 | 1 | 8 |
| [public/build/assets/app-C7Ljw2yX.css](/public/build/assets/app-C7Ljw2yX.css) | CSS | 1 | 0 | 1 | 2 |
| [public/build/manifest.json](/public/build/manifest.json) | JSON | 13 | 0 | 0 | 13 |
| [public/index.php](/public/index.php) | PHP | 10 | 4 | 7 | 21 |
| [resources/css/app.css](/resources/css/app.css) | CSS | 147 | 3 | 25 | 175 |
| [resources/js/app.js](/resources/js/app.js) | JavaScript | 2 | 5 | 2 | 9 |
| [resources/js/bootstrap.js](/resources/js/bootstrap.js) | JavaScript | 3 | 0 | 2 | 5 |
| [resources/js/live-search.js](/resources/js/live-search.js) | JavaScript | 109 | 3 | 18 | 130 |
| [resources/views/404.blade.php](/resources/views/404.blade.php) | PHP | 14 | 0 | 3 | 17 |
| [resources/views/DailyAdminEmail.blade.php](/resources/views/DailyAdminEmail.blade.php) | PHP | 35 | 0 | 1 | 36 |
| [resources/views/NewURLEmail.blade.php](/resources/views/NewURLEmail.blade.php) | PHP | 34 | 0 | 1 | 35 |
| [resources/views/NewUserEmail.blade.php](/resources/views/NewUserEmail.blade.php) | PHP | 28 | 0 | 1 | 29 |
| [resources/views/adminediturl.blade.php](/resources/views/adminediturl.blade.php) | PHP | 58 | 0 | 6 | 64 |
| [resources/views/adminpanel.blade.php](/resources/views/adminpanel.blade.php) | PHP | 40 | 0 | 7 | 47 |
| [resources/views/components/homepageLayout.blade.php](/resources/views/components/homepageLayout.blade.php) | PHP | 87 | 0 | 11 | 98 |
| [resources/views/components/initialLayout.blade.php](/resources/views/components/initialLayout.blade.php) | PHP | 76 | 0 | 7 | 83 |
| [resources/views/components/premiumLayout.blade.php](/resources/views/components/premiumLayout.blade.php) | PHP | 34 | 0 | 2 | 36 |
| [resources/views/footerpages/about.blade.php](/resources/views/footerpages/about.blade.php) | PHP | 16 | 0 | 2 | 18 |
| [resources/views/footerpages/contact.blade.php](/resources/views/footerpages/contact.blade.php) | PHP | 37 | 0 | 1 | 38 |
| [resources/views/footerpages/privacy.blade.php](/resources/views/footerpages/privacy.blade.php) | PHP | 17 | 0 | 2 | 19 |
| [resources/views/footerpages/terms.blade.php](/resources/views/footerpages/terms.blade.php) | PHP | 78 | 0 | 13 | 91 |
| [resources/views/homepage.blade.php](/resources/views/homepage.blade.php) | PHP | 80 | 0 | 5 | 85 |
| [resources/views/landing.blade.php](/resources/views/landing.blade.php) | PHP | 114 | 0 | 4 | 118 |
| [resources/views/livewire/admin-panel-guest-table.blade.php](/resources/views/livewire/admin-panel-guest-table.blade.php) | PHP | 79 | 0 | 4 | 83 |
| [resources/views/livewire/admin-panel-u-r-l-table.blade.php](/resources/views/livewire/admin-panel-u-r-l-table.blade.php) | PHP | 87 | 0 | 4 | 91 |
| [resources/views/livewire/admin-users-table.blade.php](/resources/views/livewire/admin-users-table.blade.php) | PHP | 84 | 0 | 3 | 87 |
| [resources/views/livewire/search.blade.php](/resources/views/livewire/search.blade.php) | PHP | 53 | 0 | 6 | 59 |
| [resources/views/livewire/summary-stats.blade.php](/resources/views/livewire/summary-stats.blade.php) | PHP | 15 | 0 | 1 | 16 |
| [resources/views/login.blade.php](/resources/views/login.blade.php) | PHP | 33 | 0 | 1 | 34 |
| [resources/views/mainProfile.blade.php](/resources/views/mainProfile.blade.php) | PHP | 94 | 0 | 5 | 99 |
| [resources/views/manage-avatar-form.blade.php](/resources/views/manage-avatar-form.blade.php) | PHP | 26 | 0 | 1 | 27 |
| [resources/views/premiumwelc.blade.php](/resources/views/premiumwelc.blade.php) | PHP | 91 | 0 | 2 | 93 |
| [resources/views/welcome.blade.php](/resources/views/welcome.blade.php) | PHP | 270 | 0 | 8 | 278 |
| [routes/api.php](/routes/api.php) | PHP | 12 | 0 | 3 | 15 |
| [routes/console.php](/routes/console.php) | PHP | 18 | 0 | 3 | 21 |
| [routes/web.php](/routes/web.php) | PHP | 68 | 36 | 15 | 119 |
| [tests/Feature/ExampleTest.php](/tests/Feature/ExampleTest.php) | PHP | 11 | 4 | 5 | 20 |
| [tests/TestCase.php](/tests/TestCase.php) | PHP | 6 | 1 | 4 | 11 |
| [tests/Unit/ExampleTest.php](/tests/Unit/ExampleTest.php) | PHP | 10 | 3 | 4 | 17 |
| [vite.config.js](/vite.config.js) | JavaScript | 12 | 0 | 2 | 14 |

[Summary](results.md) / Details / [Diff Summary](diff.md) / [Diff Details](diff-details.md)