# Reseller deployment notes

## Server-config requirements

`config/` and `logs/` MUST be denied at the web-server layer:

- **Apache**: shipped `.htaccess` files handle this automatically when
  `AllowOverride All` (or `AllowOverride Limit`) is set on the vhost.
- **Nginx**: copy the rules in `nginx-snippet.conf` into your `server {}`
  block. `.htaccess` is silently ignored by nginx - without these
  rules, your bcrypt admin password hash and PHP error log are publicly
  readable.

## After install

1. Edit `config/config.json` - set `apiKey`, `adminPassword` (use bcrypt),
   `apiBaseUrl` and the per-package `paymentLinks`.
2. Verify denies: `curl https://yoursite.example/config/config.json`
   and `curl https://yoursite.example/logs/php-errors.log` MUST both
   return 403.
3. Replace `assets/images/{logo,favicon}.png` with your branding.
