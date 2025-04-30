
#### Bu proje, Laravel içerisinde Google reCAPTCHA doğrulamasını manuel olarak entegre ederek formları botlara karşı korumayı amaçlar. Google Cloud Console üzerinden alınan reCAPTCHA anahtarları projeye entegre edilmiştir.

# Initial Setup and Required Steps
### Step 1: Clone the Repository

```bash
git clone https://github.com/suleyman-yilmaz/laravel-google-recaptcha.git
```
if use ssh
```bash
git clone git@github.com:suleyman-yilmaz/laravel-google-recaptcha.git
```
---
```bash
cd laravel-google-recaptcha
```
---
### Step 2: Install Required Commitments
- composer install
- copy and duplicate .env.exapmle and rename it to .env
- php artisan key:generate
---
### Step 3: Create reCaptcha key
- go to https://www.google.com/recaptcha/admin/create
- create a reCAPTCHA key for v2
- Add your `RECAPTCHA_SITE_KEY_V2` and `RECAPTCHA_SECRET_KEY_V2` to the `.env` file
---

### Step 4: Run the Project
- php artisan serve
---
