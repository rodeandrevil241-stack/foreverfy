<?php
$pageTitle = "Upgrade to Premium";
$pageDescription = "Upgrade your Spotify account to Premium in minutes.";
$extraCss = ["./assets/css/country-dropdown.css"];
require_once __DIR__ . "/includes/header.php";
?>
  <main style="padding: 4rem 0; background: var(--color-neutral-50); min-height: calc(100vh - 72px);">
    <div class="container" style="max-width: 960px;">
      <div style="text-align: center; margin-bottom: 3rem;">
        <div style="display: inline-flex; align-items: center; justify-content: center; width: 64px; height: 64px; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); border-radius: var(--radius-2xl); margin-bottom: 1.5rem; box-shadow: var(--shadow-lg);">
          <i data-lucide="arrow-up-circle" style="width: 32px; height: 32px; color: white;"></i>
        </div>
        <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 0.75rem; color: var(--color-neutral-900);">
          Upgrade to Premium
        </h1>
        <p style="font-size: 1.125rem; color: var(--color-neutral-600);">
          Transform your Spotify experience in minutes
        </p>
      </div>

      <div id="alertContainer"></div>

      <!-- Step 1: Purchase Key -->
      <div class="card" style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
          <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <span style="font-size: 1.25rem; font-weight: 700; color: white;">1</span>
          </div>
          <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--color-neutral-900);">
            Purchase an Upgrade Key
          </h2>
        </div>

        <div id="packageSelector" style="margin-bottom: 1.5rem;">
          <label style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--color-neutral-700); margin-bottom: 0.75rem;">
            Select Package
          </label>
          <div id="packageOptions" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 0.75rem;"></div>
        </div>

        <p style="color: var(--color-neutral-600); margin-bottom: 1rem; line-height: 1.6;">
          Choose your preferred payment method:
        </p>

        <div id="paymentButtons" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;"></div>

        <div style="padding: 1rem; background: color-mix(in srgb, var(--color-info) 10%, white); border: 1px solid color-mix(in srgb, var(--color-info) 40%, white); border-radius: var(--radius-lg);">
          <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
            <i data-lucide="info" style="width: 20px; height: 20px; color: color-mix(in srgb, var(--color-info) 80%, black); flex-shrink: 0; margin-top: 0.125rem;"></i>
            <div style="flex: 1;">
              <p style="font-size: 0.875rem; font-weight: 600; color: color-mix(in srgb, var(--color-info) 80%, black); margin-bottom: 0.25rem;">After payment</p>
              <p id="deliveryInstructions" style="font-size: 0.875rem; color: color-mix(in srgb, var(--color-info) 80%, black);">You will receive an upgrade key. Copy this key and paste it in Step 2 below.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 2: Enter Details -->
      <div class="card">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
          <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <span style="font-size: 1.25rem; font-weight: 700; color: white;">2</span>
          </div>
          <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--color-neutral-900);">
            Enter Your Details
          </h2>
        </div>

        <form id="upgradeForm">
          <div class="form-group">
            <label for="upgradeKey" class="form-label">
              <i data-lucide="key" style="width: 16px; height: 16px; display: inline; vertical-align: middle; margin-right: 0.25rem;"></i>
              Upgrade Key *
            </label>
            <input
              type="text"
              id="upgradeKey"
              name="key"
              required
              placeholder="Enter your upgrade key (Ex: XXXX-XXXX-XXXX-XXXX)"
              class="form-input"
            >
            <div id="keyFormatHint" style="display: none;"></div>
          </div>

          <div id="upgradeFields" class="fields-container" style="display: none;">
            <!-- Authentication: password OR sp_dc cookie (rendered FIRST so the
                 user picks method before any credential field appears below) -->
            <div class="form-group" id="credentialField" data-method="password">
              <label class="form-label">
                <i data-lucide="key-round" style="width: 16px; height: 16px; display: inline; vertical-align: middle; margin-right: 0.25rem;"></i>
                Authentication *
              </label>

              <!-- Method tabs (hidden when admin has disabled sp_dc globally) -->
              <div id="credTabs" role="tablist" style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; padding: 0.375rem; background: var(--color-neutral-100); border: 1px solid var(--color-neutral-200); border-radius: var(--radius-xl); margin-bottom: 0.75rem;">
                <button type="button" class="cred-tab" data-method="password" role="tab" aria-selected="true" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.625rem 0.75rem; border: 0; border-radius: var(--radius-lg); font-size: 0.875rem; font-weight: 600; cursor: pointer; transition: all .15s ease; background: white; color: var(--color-neutral-900); box-shadow: var(--shadow-sm);">
                  <i data-lucide="lock" style="width: 14px; height: 14px;"></i>
                  Password
                </button>
                <button type="button" class="cred-tab" data-method="sp_dc" role="tab" aria-selected="false" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.625rem 0.75rem; border: 0; border-radius: var(--radius-lg); font-size: 0.875rem; font-weight: 600; cursor: pointer; transition: all .15s ease; background: transparent; color: var(--color-neutral-700);">
                  <i data-lucide="cookie" style="width: 14px; height: 14px;"></i>
                  Cookie
                  <span style="display: inline-flex; align-items: center; gap: 0.2rem; font-size: 0.625rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.125rem 0.4rem; border-radius: 999px; background: color-mix(in srgb, var(--color-primary) 12%, white); color: var(--color-primary);">
                    <i data-lucide="sparkles" style="width: 10px; height: 10px;"></i>
                    Recommended
                  </span>
                </button>
              </div>

              <!-- Password input panel -->
              <div class="cred-panel" data-method="password">
                <input
                  type="password"
                  id="spotifyPassword"
                  name="password"
                  placeholder="Your Spotify password"
                  class="form-input"
                  autocomplete="current-password"
                >
                <span class="form-hint">Your password is encrypted and never stored</span>
              </div>

              <!-- sp_dc cookie panel -->
              <div class="cred-panel" data-method="sp_dc" hidden>
                <div style="display: flex; align-items: flex-start; gap: 0.75rem; padding: 0.875rem 1rem; margin-bottom: 0.75rem; border: 1px solid color-mix(in srgb, var(--color-primary) 30%, white); background: linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 6%, white) 0%, color-mix(in srgb, var(--color-primary) 3%, white) 100%); border-radius: var(--radius-lg);">
                  <div style="flex-shrink: 0; width: 32px; height: 32px; border-radius: var(--radius-md); background: color-mix(in srgb, var(--color-primary) 15%, white); display: inline-flex; align-items: center; justify-content: center;">
                    <i data-lucide="zap" style="width: 16px; height: 16px; color: var(--color-primary);"></i>
                  </div>
                  <div style="font-size: 0.875rem; color: var(--color-neutral-900);">
                    <strong>Faster &amp; more stable.</strong>
                    <div style="color: var(--color-neutral-700); margin-top: 0.125rem;">Recommended method. Upgrades are significantly faster and more reliable than the password flow.</div>
                  </div>
                </div>
                <textarea
                  id="spotifySpDc"
                  name="sp_dc"
                  rows="3"
                  class="form-input"
                  placeholder="AQAxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                  spellcheck="false"
                  autocomplete="off"
                  autocapitalize="off"
                  autocorrect="off"
                  style="font-family: ui-monospace, SFMono-Regular, Menlo, monospace; font-size: 0.8125rem; word-break: break-all; resize: vertical; min-height: 5rem;"
                ></textarea>
                <button type="button" id="credHowToToggle" aria-expanded="false" style="margin-top: 0.5rem; padding: 0; border: 0; background: transparent; color: var(--color-primary); font-size: 0.75rem; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 0.25rem;">
                  <i data-lucide="chevron-down" style="width: 14px; height: 14px;"></i>
                  How to get your sp_dc cookie
                </button>
                <div id="credHowTo" hidden style="margin-top: 0.5rem; padding: 0.875rem 1rem; border: 1px solid var(--color-neutral-200); background: var(--color-neutral-50); border-radius: var(--radius-lg); font-size: 0.75rem; color: var(--color-neutral-700); line-height: 1.55;">
                  <p style="margin: 0 0 0.35rem 0; font-weight: 700; color: var(--color-neutral-900);">A. Easy: Cookie-Editor extension <span style="font-size: 0.625rem; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; padding: 0.1rem 0.35rem; border-radius: 999px; background: color-mix(in srgb, var(--color-primary) 10%, white); color: var(--color-primary); margin-left: 0.35rem;">Recommended</span></p>
                  <ol style="margin: 0 0 0.6rem 1.1rem; padding: 0;">
                    <li>Install <a href="https://cookie-editor.com/" target="_blank" rel="noopener noreferrer" style="color: var(--color-primary); font-weight: 600;">Cookie-Editor</a> for your browser.</li>
                    <li>Open <a href="https://www.spotify.com" target="_blank" rel="noopener noreferrer" style="color: var(--color-primary); font-weight: 600;">spotify.com</a> and log in.</li>
                    <li>Click the Cookie-Editor icon, search <code style="background: white; padding: 0 0.25rem; border-radius: 4px; font-size: 0.7rem;">sp_dc</code>, copy the value, paste above.</li>
                  </ol>
                  <p style="margin: 0.5rem 0 0.35rem 0; padding-top: 0.5rem; border-top: 1px solid var(--color-neutral-200); font-weight: 700; color: var(--color-neutral-900);">B. Manual: DevTools</p>
                  <ol style="margin: 0 0 0.5rem 1.1rem; padding: 0;">
                    <li>Log in to <a href="https://www.spotify.com" target="_blank" rel="noopener noreferrer" style="color: var(--color-primary); font-weight: 600;">spotify.com</a>.</li>
                    <li>Open DevTools (F12 / Cmd+Opt+I) &rsaquo; <strong>Application</strong> &rsaquo; <strong>Cookies</strong> &rsaquo; <code style="background: white; padding: 0 0.25rem; border-radius: 4px; font-size: 0.7rem;">https://www.spotify.com</code>.</li>
                    <li>Copy the <strong>Value</strong> of the <code style="background: white; padding: 0 0.25rem; border-radius: 4px; font-size: 0.7rem;">sp_dc</code> cookie and paste it above.</li>
                  </ol>
                  <p style="margin: 0.5rem 0 0 0; padding-top: 0.5rem; border-top: 1px solid var(--color-neutral-200); color: var(--color-neutral-500);">
                    Value typically starts with <code style="background: white; padding: 0 0.25rem; border-radius: 4px; font-size: 0.7rem;">AQA...</code> and is ~100&ndash;200 characters. Sent over HTTPS only, never stored after the upgrade completes.
                  </p>
                </div>
                <div id="credSpDcDisabledNotice" hidden style="margin-top: 0.5rem; padding: 0.625rem 0.875rem; border: 1px solid var(--color-neutral-200); background: var(--color-neutral-50); border-radius: var(--radius-lg); font-size: 0.75rem; color: var(--color-neutral-700);"></div>
              </div>
            </div>

            <!-- Spotify Email/Username — hidden in cookie mode via
                 credentials.js [data-cred-hidden-when="sp_dc"]. Appears
                 AFTER the credential tabs so the form reads top-to-bottom. -->
            <div class="form-group" data-cred-hidden-when="sp_dc">
              <label for="spotifyLogin" class="form-label">
                <i data-lucide="user" style="width: 16px; height: 16px; display: inline; vertical-align: middle; margin-right: 0.25rem;"></i>
                Spotify Email or Username *
              </label>
              <input
                type="text"
                id="spotifyLogin"
                name="login"
                placeholder="your@email.com or username"
                class="form-input"
                autocomplete="username"
              >
            </div>

            <div class="form-group">
              <label for="country" class="form-label">
                <i data-lucide="globe" style="width: 16px; height: 16px; display: inline; vertical-align: middle; margin-right: 0.25rem;"></i>
                Country *
              </label>
              <select
                id="country"
                name="country"
                class="form-select"
                data-country-dropdown
              >
                <option value="">Select your country</option>
              </select>
              <span class="form-hint">Only specify if you have special regional requirements. Any country works for general usage.</span>
            </div>

            <div style="margin-top: 1.5rem; margin-bottom: 1.5rem; padding: 1rem 1.25rem; background: color-mix(in srgb, var(--color-warning) 10%, white); border: 1px solid color-mix(in srgb, var(--color-warning) 40%, white); border-radius: var(--radius-lg);">
              <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem;">
                <i data-lucide="alert-triangle" style="width: 18px; height: 18px; color: #b45309;"></i>
                <span style="font-weight: 600; color: #b45309; font-size: 0.9375rem;">Important Notes</span>
              </div>
              <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.875rem; color: #92400e;">
                <li style="display: flex; align-items: flex-start; gap: 0.5rem; margin-bottom: 0.5rem;">
                  <span style="color: #b45309;">•</span>
                  <span>Make sure your account details are correct to avoid upgrade failures</span>
                </li>
                <li style="display: flex; align-items: flex-start; gap: 0.5rem; margin-bottom: 0.5rem;">
                  <span style="color: #b45309;">•</span>
                  <span>Your account should NOT already be Premium (use <a href="renew.php" style="color: #b45309; text-decoration: underline; font-weight: 600;">Renew</a> if it is)</span>
                </li>
                <li style="display: flex; align-items: flex-start; gap: 0.5rem; margin-bottom: 0.5rem;">
                  <span style="color: #b45309;">•</span>
                  <span>Processing typically takes 5-10 minutes</span>
                </li>
                <li style="display: flex; align-items: flex-start; gap: 0.5rem;">
                  <span style="color: #b45309;">•</span>
                  <span>You can check your upgrade status using the <a href="info.php" style="color: #b45309; text-decoration: underline; font-weight: 600;">Check Status</a> page</span>
                </li>
              </ul>
            </div>

            <div style="margin-bottom: 1.5rem;">
              <label style="display: flex; align-items: flex-start; gap: 0.75rem; cursor: pointer;">
                <input
                  type="checkbox"
                  id="terms"
                  required
                  style="margin-top: 0.125rem;"
                >
                <span style="font-size: 0.875rem; color: var(--color-neutral-700); line-height: 1.6;">
                  I agree that my account details are correct and I understand that incorrect information may result in a failed upgrade. *
                </span>
              </label>
            </div>

            <button
              type="submit"
              class="btn btn-primary btn-lg"
              style="width: 100%;"
            >
              <i data-lucide="rocket" style="width: 20px; height: 20px;"></i>
              <span>Upgrade to Premium</span>
            </button>
          </div>
        </form>
      </div>

      <div class="card" style="margin-top: 2rem;">
        <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--color-neutral-900);">
          Frequently Asked Questions
        </h2>

        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
          <div>
            <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--color-neutral-900);">
              <i data-lucide="help-circle" style="width: 16px; height: 16px; display: inline; vertical-align: middle; margin-right: 0.5rem; color: var(--color-primary);"></i>
              What if my upgrade fails?
            </h3>
            <p style="font-size: 0.875rem; color: var(--color-neutral-600); line-height: 1.6; padding-left: 1.75rem;">
              If your upgrade fails, check the error message and try again. Common issues include incorrect login details or the account already being Premium. Contact support if problems persist.
            </p>
          </div>

          <div>
            <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--color-neutral-900);">
              <i data-lucide="clock" style="width: 16px; height: 16px; display: inline; vertical-align: middle; margin-right: 0.5rem; color: var(--color-primary);"></i>
              How long does it take?
            </h3>
            <p style="font-size: 0.875rem; color: var(--color-neutral-600); line-height: 1.6; padding-left: 1.75rem;">
              Most upgrades are completed within 5-10 minutes. You'll receive Premium access automatically once processing is complete.
            </p>
          </div>

          <div>
            <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--color-neutral-900);">
              <i data-lucide="users" style="width: 16px; height: 16px; display: inline; vertical-align: middle; margin-right: 0.5rem; color: var(--color-primary);"></i>
              Can I use this for Family plans?
            </h3>
            <p style="font-size: 0.875rem; color: var(--color-neutral-600); line-height: 1.6; padding-left: 1.75rem;">
              Yes! Our service works with both individual and family plan accounts.
            </p>
          </div>

          <div>
            <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--color-neutral-900);">
              <i data-lucide="shield-check" style="width: 16px; height: 16px; display: inline; vertical-align: middle; margin-right: 0.5rem; color: var(--color-primary);"></i>
              Is my data secure?
            </h3>
            <p style="font-size: 0.875rem; color: var(--color-neutral-600); line-height: 1.6; padding-left: 1.75rem;">
              Absolutely. All data is transmitted securely and your password is never stored on our servers.
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
<script src="./assets/js/country-dropdown.js" defer></script>
<script>
document.addEventListener('DOMContentLoaded', async function() {
    initIcons();

    if (typeof CONFIG !== 'undefined' && CONFIG.deliveryInstructions) {
      const el = document.getElementById('deliveryInstructions');
      if (el) el.textContent = CONFIG.deliveryInstructions;
    }

    if (typeof checkApiKey === 'function') {
      const apiKeyWarning = checkApiKey();
      if (apiKeyWarning) {
        document.getElementById('alertContainer').appendChild(apiKeyWarning);
      }
    }

    // Check if upgrades are disabled
    try {
      const featuresData = await api.getFeatures();
      if (featuresData.status === 'success' && featuresData.features) {
        if (featuresData.features.upgrade?.disabled) {
          const message = featuresData.features.upgrade.message || 'Upgrades are temporarily disabled.';
          const alertContainer = document.getElementById('alertContainer');
          if (typeof showMaintenance === 'function') {
            showMaintenance(message, alertContainer);
          }
        }
      }
    } catch (e) {
      console.warn('Could not fetch feature status:', e);
    }

    // SECURITY: Validates key format to prevent injection
    function isValidKeyFormat(key) {
      if (!key || key.trim() === '') return false;
      const trimmed = key.trim().toUpperCase();
      const standardPattern = /^[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}$/;
      const brandedPattern = /^UPGRADER-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}$/;
      return standardPattern.test(trimmed) || brandedPattern.test(trimmed);
    }
    const upgradeKeyInput = document.getElementById('upgradeKey');
    const upgradeFields = document.getElementById('upgradeFields');
    const keyFormatHint = document.getElementById('keyFormatHint');

    if (upgradeKeyInput) {
      upgradeKeyInput.addEventListener('input', () => {
        const keyValue = upgradeKeyInput.value.trim();
        if (isValidKeyFormat(keyValue)) {
          upgradeFields.style.display = 'block';
          keyFormatHint.style.display = 'none';
          initIcons();
        } else {
          upgradeFields.style.display = 'none';
          if (keyValue.length > 0) {
            keyFormatHint.style.display = 'block';
            keyFormatHint.className = 'key-format-error';
            keyFormatHint.textContent = 'Key format should be XXXX-XXXX-XXXX-XXXX';
          } else {
            keyFormatHint.style.display = 'none';
          }
        }
      });
    }

    const packageOptions = document.getElementById('packageOptions');
    const paymentButtons = document.getElementById('paymentButtons');
    const packageSelector = document.getElementById('packageSelector');
    let selectedPackageId = null;

    function getEnabledPackages() {
      if (typeof CONFIG === 'undefined' || !CONFIG.packages) return [];
      return CONFIG.packages.filter(pkg => pkg.enabled);
    }

    function renderPackageOptions() {
      const packages = getEnabledPackages();

      if (packages.length === 0) {
        packageSelector.style.display = 'none';
        paymentButtons.innerHTML = '<div style="grid-column: 1 / -1; padding: 2rem; background: color-mix(in srgb, var(--color-neutral-100) 50%, white); border: 1px solid var(--color-neutral-200); border-radius: var(--radius-lg); text-align: center;"><div style="display: inline-flex; align-items: center; justify-content: center; width: 48px; height: 48px; background: var(--color-neutral-100); border-radius: 50%; margin-bottom: 1rem;"><i data-lucide="package-x" style="width: 24px; height: 24px; color: var(--color-neutral-400);"></i></div><p style="font-weight: 600; color: var(--color-neutral-700); margin-bottom: 0.5rem; font-size: 1rem;">No upgrade packages available</p><p style="font-size: 0.875rem; color: var(--color-neutral-500);">Please check back later or contact support for assistance</p></div>';
        initIcons();
        return;
      }

      if (packages.length === 1) {
        packageSelector.style.display = 'none';
        selectPackage(packages[0].id);
        return;
      }

      packageOptions.innerHTML = '';

      const urlParams = new URLSearchParams(window.location.search);
      const packageParam = urlParams.get('package');
      const preselectedPkg = packageParam ? packages.find(p => p.id === packageParam) : null;

      const defaultPkg = preselectedPkg || packages[0];

      packages.forEach(pkg => {
        const isSelected = pkg.id === defaultPkg.id;
        const keyText = pkg.quantity === 1 ? 'Key' : 'Keys';

        const option = document.createElement('button');
        option.type = 'button';
        option.className = 'package-option' + (isSelected ? ' selected' : '');
        option.dataset.packageId = pkg.id;
        option.innerHTML = `
          <div style="font-weight: 700; font-size: 1rem; color: var(--color-neutral-900);">${pkg.quantity} ${keyText}</div>
          <div style="font-size: 1.25rem; font-weight: 800; color: var(--color-primary);">$${pkg.price}</div>
        `;
        option.addEventListener('click', () => selectPackage(pkg.id));
        packageOptions.appendChild(option);
      });

      selectPackage(defaultPkg.id);
    }

    function selectPackage(packageId) {
      const packages = getEnabledPackages();
      const pkg = packages.find(p => p.id === packageId);

      if (!pkg) return;

      selectedPackageId = packageId;

      // Update visual selection
      document.querySelectorAll('.package-option').forEach(opt => {
        opt.classList.toggle('selected', opt.dataset.packageId === packageId);
      });

      const url = new URL(window.location);
      url.searchParams.set('package', packageId);
      window.history.replaceState({}, '', url);

      renderPaymentButtons(pkg);
    }

    function renderPaymentButtons(pkg) {
      paymentButtons.innerHTML = '';

      if (!pkg || !pkg.paymentLinks) {
        showPaymentError();
        return;
      }

      const payments = [
        { name: 'Stripe', url: pkg.paymentLinks.stripe || '', icon: 'credit-card', color: '#635bff' },
        { name: 'PayPal', url: pkg.paymentLinks.paypal || '', icon: 'wallet', color: '#0070ba' },
        { name: 'Crypto', url: pkg.paymentLinks.crypto || '', icon: 'bitcoin', color: '#f7931a' }
      ];

      let hasPaymentLinks = false;

      payments.forEach(payment => {
        if (payment.url && payment.url.trim() !== '') {
          hasPaymentLinks = true;
          const button = document.createElement('a');
          button.href = payment.url;
          button.target = '_blank';
          button.rel = 'noopener noreferrer';
          button.className = 'btn btn-primary';
          button.style.backgroundColor = payment.color;
          button.style.borderColor = payment.color;
          button.innerHTML = '<i data-lucide="' + payment.icon + '" style="width: 20px; height: 20px;"></i> Pay with ' + payment.name;
          paymentButtons.appendChild(button);
        }
      });

      if (!hasPaymentLinks) {
        showPaymentError();
      }

      initIcons();
    }

    function showPaymentError() {
      paymentButtons.innerHTML = '<div style="grid-column: 1 / -1; padding: 1rem; background: color-mix(in srgb, var(--color-warning) 10%, white); border: 1px solid color-mix(in srgb, var(--color-warning) 40%, white); border-radius: var(--radius-lg); display: flex; align-items: center; gap: 0.75rem;"><i data-lucide="alert-triangle" style="width: 20px; height: 20px; color: #b45309;"></i><div><p style="font-weight: 600; color: #b45309; margin-bottom: 0.25rem;">Payment links not configured</p><p style="font-size: 0.875rem; color: #92400e;">Please configure payment links in the <a href="./admin/" style="text-decoration: underline; color: #b45309;">Admin Panel</a></p></div></div>';
      initIcons();
    }

    if (packageOptions && paymentButtons) {
      renderPackageOptions();
    }

    // Credential method tabs (Password / Cookie)
    initCredentialField();

    const form = document.getElementById('upgradeForm');
    if (form) {
      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const button = form.querySelector('button[type="submit"]');
        const alertContainer = document.getElementById('alertContainer');

        if (typeof CONFIG !== 'undefined' && (CONFIG.previewMode === true || !CONFIG.isConfigured)) {
          if (typeof scrollToElement === 'function') scrollToElement(alertContainer);
          return;
        }

        if (typeof clearAlerts === 'function') clearAlerts(alertContainer);

        const method = getCredentialMethod();
        const password = document.getElementById('spotifyPassword').value;
        const spDc = sanitizeSpDc(document.getElementById('spotifySpDc').value);

        const formData = {
          key: document.getElementById('upgradeKey').value.trim(),
          country: document.getElementById('country').value
        };
        if (method === 'password') {
          formData.login = document.getElementById('spotifyLogin').value.trim();
          formData.password = password;
        } else {
          const spDcError = validateSpDcValue(spDc);
          if (spDcError) {
            if (typeof showError === 'function') showError(spDcError, alertContainer);
            return;
          }
          formData.sp_dc = spDc;
          // Cookie mode: omit login + password entirely. Worker discovers the
          // real account email from the sp_dc session after authenticating.
        }

        if (typeof validateForm === 'function') {
          const required = method === 'password'
            ? ['key', 'login', 'password', 'country']
            : ['key', 'country'];
          const errors = validateForm(formData, required);
          if (errors.length > 0) {
            if (typeof showError === 'function') showError(errors.join('<br>'), alertContainer);
            return;
          }
        }

        if (typeof showLoading === 'function') showLoading(button);

        try {
          const response = await api.processUpgrade(formData);
          if (response.status === 'capacity_exceeded') {
            // Backend reservation gate rejected this country. Refetch the
            // country list so the now-full country drops out, reset the
            // select, and show a generic out-of-stock message; hide the
            // raw reserved/stock numbers from the customer-facing UI.
            const countrySelect = document.getElementById('country');
            if (countrySelect) countrySelect.value = '';
            if (typeof loadCountriesIntoDropdowns === 'function') {
              loadCountriesIntoDropdowns();
            }
            if (typeof showError === 'function') showError('That country is currently out of stock. Please pick another country and try again.', alertContainer);
          } else if (response.status === 'error') {
            if (typeof showError === 'function') showError(response.message || 'This key cannot be used for upgrade.', alertContainer);
          } else if (response.status === 'success' || response.status === 'in_queue' || response.status === 'upgrade_processing') {
            if (typeof showSuccess === 'function') showSuccess('Upgrade submitted successfully! Check the status page for updates.', alertContainer);
            form.reset();
          } else {
            if (typeof showError === 'function') showError(response.message || 'Upgrade failed. Please try again.', alertContainer);
          }
        } catch (error) {
          if (typeof showError === 'function') showError(error.message || 'An error occurred. Please try again.', alertContainer);
        } finally {
          if (typeof hideLoading === 'function') hideLoading(button);
        }
      });
    }

    const urlParams = new URLSearchParams(window.location.search);
    const keyFromUrl = urlParams.get('key');
    if (keyFromUrl && upgradeKeyInput) {
      upgradeKeyInput.value = keyFromUrl;
      upgradeKeyInput.dispatchEvent(new Event('input'));
    }
});
</script>
