# OCSI website

Local WordPress site for Optimized Customer Solutions, Inc. The repository tracks the custom theme, the custom plugin, and the planning documents. WordPress core stays on disk and is not committed.

## Local site

With XAMPP Apache and MySQL running, open [http://localhost/ocsi/](http://localhost/ocsi/).

The database is `ocsi`. The admin username and password are in `.local-credentials` in this folder. That file is not in git.

The OCSI theme and the OCSI Core plugin should both be active. OCSI Core adds two content types:

- **Branches** at `/branches/`, with address, region, phone, hours, and a directions link.
- **Vacancies** at `/jobs/`, with department, location, employment type, closing date, and an apply link. Responsibilities and qualifications go in the post editor. The site does not accept CV uploads.

## What is tracked

- `wp-content/themes/ocsi`
- `wp-content/plugins/ocsi-core`
- `ocsi-website-project-brief.md`
- `ocsi-visual-direction.md`

`wp-config.php`, uploads, and `.htaccess` are local only.

## Recreate the local install

1. Clone this repository into `htdocs/ocsi`.
2. Download WordPress into that same folder so `wp-load.php` sits next to `wp-content`.
3. Create a MySQL database named `ocsi` and a `wp-config.php` that points at it.
4. Install WordPress at `http://localhost/ocsi/`.
5. Activate the OCSI theme and the OCSI Core plugin.
6. Set permalinks to “Post name”.

From Git Bash, do not pass a path that starts with `/` into WP-CLI. Git rewrites it into a Windows path and corrupts the permalink structure. Set the option from a PHP file, or run:

```bash
MSYS_NO_PATHCONV=1 php wp-cli.phar option update permalink_structure '/%postname%/'
```

## Visual direction

The theme follows Direction A in `ocsi-visual-direction.md`: forest green `#183D32`, warm ivory `#F7F5EF`, charcoal text, sage panels, and a small muted-gold mark. Headings use Manrope. Body text uses Inter.

The homepage line “Moving Brands Forward.” is proposed copy from that document. It is not approved company messaging. The palette is a starting point until OCSI confirms a logo and brand colors.

## InfinityFree

[InfinityFree](https://www.infinityfree.com/) can host a public preview on a free subdomain. It is not a suitable production host for this site.

- PHP `mail()` does not deliver. Inquiry forms need an external SMTP account on port 587 before they can be turned on.
- Scheduled tasks do not run on their own. Their browser check blocks non-browser requests, including automatic calls to `wp-cron.php`.
- The free plan allows 50,000 file requests a day. Crossing that, or tripping I/O limits with a backup plugin, takes the site offline for 24 hours.
- Disk is 5 GB, with about 30,000 files. There is no Git deploy, SSH, or staging. Upload changes by FTP or the file manager.
- Search indexing on a free subdomain should be checked before anyone relies on it. Idle accounts can be removed.

Build and review on XAMPP. Use InfinityFree only as a temporary preview. The project brief still calls for managed WordPress hosting when the site is ready to launch.
