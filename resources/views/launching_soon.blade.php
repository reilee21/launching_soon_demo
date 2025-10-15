<!DOCTYPE html>
<html class="dark" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Hei Hai Capital</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Montserrat:wght@700;800&amp;display=swap" rel="stylesheet" />
  <style>
    body {
      background-image: url('data:image/svg+xml,%3Csvg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M3.13 .515a.5.5 0 00-.515.515l.515-.515zm93.74 0l.515.515a.5.5 0 00-.515-.515zM96.87 99.485l-.515.515a.5.5 0 00.515-.515zm-93.74 0l-.515-.515a.5.5 0 00.515.515zM2.615 1.03h94.77v-1.03H2.615v1.03zm95.285.515v97.94h1.03v-97.94h-1.03zm-.515 98.455H3.13v1.03h94.255v-1.03zM2.615 99.485V1.545h-1.03v97.94h1.03z" fill="%23373B4B" fill-rule="nonzero" fill-opacity=".2"/%3E%3C/svg%3E');
    }

    .scroll-reveal {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .scroll-reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .error-message {
      display: none;
    }

    #success-alert {
      opacity: 0;
      pointer-events: none;
      transform: translateX(100px);
      transition: all 0.3s ease;
    }

    #success-alert.show {
      opacity: 1;
      pointer-events: auto;
      transform: translateX(0);
    }
  </style>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: "#FBBF24",
            "background-light": "#F3F4F6",
            "background-dark": "#111827",
            "card-light": "#FFFFFF",
            "card-dark": "#1F2937",
            "text-light": "#111827",
            "text-dark": "#F9FAFB",
            "subtext-light": "#6B7280",
            "subtext-dark": "#9CA3AF",
          },
          fontFamily: {
            display: ["Montserrat", "sans-serif"],
            sans: ["Inter", "sans-serif"],
          },
          borderRadius: {
            DEFAULT: "0.5rem",
          },
        },
      },
    };
  </script>
</head>

<body class="bg-background-light dark:bg-background-dark font-sans text-text-light dark:text-text-dark transition-colors duration-300">
  <div class="min-h-screen flex flex-col items-center justify-between p-4 sm:p-6 lg:p-8">
    <header class="w-full max-w-7xl mx-auto flex justify-between items-center py-4">
      <div class="flex items-center space-x-3">
        <svg class="h-8 w-8 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" fill-rule="evenodd"></path>
        </svg>
        <span class="text-xl font-bold font-display tracking-wider text-text-light dark:text-text-dark">HEI HAI</span>
      </div>
      <a class="px-4 py-2 text-sm font-medium border border-primary text-primary rounded-md hover:bg-primary hover:text-white dark:hover:text-background-dark transition-colors" href="#">
        High-Value Global Strategic Investment
      </a>
    </header>
    <main class="flex-grow flex flex-col items-center justify-center text-center px-4">
      <h1 class="font-display font-extrabold text-6xl sm:text-7xl md:text-8xl lg:text-9xl text-primary tracking-wide uppercase" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">
        Launching Soon
      </h1>
      <p class="mt-4 font-display font-bold text-lg sm:text-xl md:text-2xl text-primary/80">
        CRAFTING WEALTH WITH AI &amp; BLOCKCHAIN FOR STRATEGIC GLOBAL INVESTMENT
      </p>
      <p class="mt-8 max-w-3xl text-base sm:text-lg text-subtext-light dark:text-subtext-dark">
        We are engineering a new era of global strategic investment, leveraging artificial intelligence, blockchain integrity, and big data analytics. The future of wealth is now.
      </p>
      <div class="mt-16 text-center">
        <p class="font-display font-bold text-xl sm:text-2xl text-primary">
          REAL-TIME GLOBAL VALUE INDICATORS
        </p>
        <p class="mt-4 font-display font-extrabold text-6xl sm:text-7xl text-text-light dark:text-text-dark">
          38,492
        </p>
        <p class="text-sm font-medium uppercase tracking-widest text-subtext-light dark:text-subtext-dark">
          REAL-TIME VALUE SIGNALS
        </p>
      </div>
      <div class="w-full max-w-3xl mt-12 p-6 sm:p-8 bg-card-light dark:bg-card-dark rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-bold text-center text-text-light dark:text-text-dark">Value Indicators by <span class="text-primary">Geolocation</span></h3>
        <div class="mt-8 space-y-6">
          <div class="flex items-center">
            <img alt="USA flag" class="w-5 h-auto mr-4" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCieVez4jz3UT8GbBw3rMBHfBQb3Xq30qx38W8tBUGy0ON6tM2q6NqU7dksIm3aYK22XTgUfZjqOkpfeHtO8JPkYxqe2U765l9YjrIBEuWsp6hBhlehtlZzqXedCc-cQJfH08pnQFDsIKShHZI95XC1HOii49S3tAxySyRh8YpJxJlKriSYEz_ZSmU3DaO3G9sCxgoNii4LKM5pUMNZmnlWnrxiRlFrXayD8CYpPlQacAhWG3S3zuX3QbWBEd2zP4bThGqmRRNP99kw" />
            <span class="w-1/3 text-left text-sm font-medium text-subtext-light dark:text-subtext-dark">United States</span>
            <div class="w-2/3 flex items-center">
              <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                <div class="bg-primary h-2.5 rounded-full" style="width: 95%"></div>
              </div>
              <span class="ml-4 text-sm font-semibold text-text-light dark:text-text-dark">8,315</span>
            </div>
          </div>
          <div class="flex items-center">
            <img alt="Singapore flag" class="w-5 h-auto mr-4" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBEOuk_C2kT2G6FruHE0pTKw5hAZtE_XnV0xWO8Ih47an1D-ZWKRxVTZx98S-BGxw0MN4JVrYltT3S_78q8bPct0HdQ29YMRaaYYXpl8E-umkUaex9p-HynYqXkNVHuRL1j3qd0_By4TTEAgC33L0e4M9Q2OaW4MwPsXq8-Na9QumQ1yBDoNSliqWLMejgfAK7o9iUBGUtLqMFIBT5Uv52jfs3StWOpUlxTBWeWTlNv0HDSFJhiyK0rHYvxBQ2ME12D4-aEThMkQtqu" />
            <span class="w-1/3 text-left text-sm font-medium text-subtext-light dark:text-subtext-dark">Singapore</span>
            <div class="w-2/3 flex items-center">
              <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                <div class="bg-primary h-2.5 rounded-full" style="width: 75%"></div>
              </div>
              <span class="ml-4 text-sm font-semibold text-text-light dark:text-text-dark">6,248</span>
            </div>
          </div>
          <div class="flex items-center">
            <img alt="UK flag" class="w-5 h-auto mr-4" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBA4KgaUmDqOGomdhkpuR-MINYKEy7w5-eIUwsqUWq8z5cgBWA3PQ7fGnmuf9FpLfd2NoVR6VgEtxBhbdsNpuszYpC6KLmn66Avoi03VgQXqIjeDi4m1saT6uTUeFwlWz0MSeRyycziPNa47YHxEdsMENdliI61IL37URQdSj5NcKtUCrwEZKRLlvuheLXqG55Qps1kLnlNSkC3SlmqYU3_Ab0riDplFZtIY4RUaY7FXwXK0GtxutoJv5gkf8F6vbqrL-A2ups3XdWI" />
            <span class="w-1/3 text-left text-sm font-medium text-subtext-light dark:text-subtext-dark">United Kingdom</span>
            <div class="w-2/3 flex items-center">
              <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                <div class="bg-primary h-2.5 rounded-full" style="width: 50%"></div>
              </div>
              <span class="ml-4 text-sm font-semibold text-text-light dark:text-text-dark">4,197</span>
            </div>
          </div>
          <div class="flex items-center">
            <img alt="Germany flag" class="w-5 h-auto mr-4" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDO-pYoWuVxcJNd39PoXU7Mab-x8nXstHd_bZnOqz5dOTPNuU48Pa8DxHhBeeR3BIdFOMCuevCFPmKNcqK68han5BiHkDmrHxeW4P4uC_TIQe2Z_uCJrSJ9r0L23T10TuSmv6YTOmRYFcx5y1A3VPYtV-pRvmdjE7NaNtn5KLRgIYVIPQf5hZg2oxzo0XLL1kPwWD5C4k1U6qo0ECnH69USFIQ1EX5ApIy3XyFA4dYgtyxR9uVvh7XmWRKdDTFAbK-vVuIuvS2h5xHD" />
            <span class="w-1/3 text-left text-sm font-medium text-subtext-light dark:text-subtext-dark">Germany</span>
            <div class="w-2/3 flex items-center">
              <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                <div class="bg-primary h-2.5 rounded-full" style="width: 46%"></div>
              </div>
              <span class="ml-4 text-sm font-semibold text-text-light dark:text-text-dark">3,880</span>
            </div>
          </div>
          <div class="flex items-center">
            <img alt="UAE flag" class="w-5 h-auto mr-4" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbSe8mM1W9cu18p5TlS26vyXxG6I_drlkN-JjoAI_98RIX1y-BgRkLItVEmWa_hwB7mxfB2tmwbtqpw17-nkojHus0Dh8uZlJ_vU3ihl1wGQ5hbc01VloxHN4umHWlySOmISG_Cy-OMtIOG7tdhacU_VsYlU5uftkiHPJQX-X8E1P3CTAjCdCk43v9AoI7TuLedbCdJCAoSemUdLRrlZwTZxHfS_K_oCimCYb38qjBRMD-zEpN0h9fy13UbUGQ0IUueUIm0cDxLF43" />
            <span class="w-1/3 text-left text-sm font-medium text-subtext-light dark:text-subtext-dark">United Arab Emirates</span>
            <div class="w-2/3 flex items-center">
              <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                <div class="bg-primary h-2.5 rounded-full" style="width: 42%"></div>
              </div>
              <span class="ml-4 text-sm font-semibold text-text-light dark:text-text-dark">3,520</span>
            </div>
          </div>
          <div class="flex items-center">
            <img alt="Switzerland flag" class="w-5 h-auto mr-4" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZeqVgMX5i447RJ_rZPsOO7olqQgDv5AHcEp7KV6pK-QEATjG6nt0hgSJT9EXm9m6OhQvhbnQB9T2awxQxdp5SeqL-4JaZ1kJ4QWIKOBuF42JVAVHeD2iud5bWVHhyJWIGWyyPFSe7itIH2KobZBOnHXrzx4u6MJXJX9HNukcsSk4hX_z76k9t6UcIbeqs0MK1KMgjN2I73kGgvuKlykkEIqW-fi2kz9Ksuy4rwsnkmzUbKzPyNJ7919s76GqBtyuCmVyY6degc9cY" />
            <span class="w-1/3 text-left text-sm font-medium text-subtext-light dark:text-subtext-dark">Switzerland</span>
            <div class="w-2/3 flex items-center">
              <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                <div class="bg-primary h-2.5 rounded-full" style="width: 34%"></div>
              </div>
              <span class="ml-4 text-sm font-semibold text-text-light dark:text-text-dark">2,810</span>
            </div>
          </div>
        </div>
        <p class="mt-8 text-xs text-center text-subtext-light dark:text-subtext-dark">
          Value signals are analyzed via intelligent geolocation and real-time data analytics.
        </p>
      </div>
      <div class="w-full max-w-lg mt-20 mb-10 scroll-reveal">
        <div class="bg-card-light dark:bg-card-dark rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700/50 overflow-hidden">
          <div class="p-8 sm:p-10">
            <h3 class="text-2xl font-bold text-center text-text-light dark:text-text-dark mb-2 font-display">Get Notified</h3>
            <p class="text-center text-subtext-light dark:text-subtext-dark mb-8">Be the first to know when we launch.</p>
            <form action="#" class="space-y-6" id="contactForm" method="POST" novalidate="">
              <div>
                <label class="sr-only" for="name">Full Name</label>
                <input class="block w-full px-4 py-3 bg-transparent border-b-2 border-gray-200 dark:border-gray-600 text-text-light dark:text-text-dark placeholder-subtext-light dark:placeholder-subtext-dark focus:outline-none focus:border-primary transition-colors duration-300" id="name" name="name" placeholder="Full Name" required="" type="text" />
              </div>
              <div>
                <label class="sr-only" for="email">Email</label>
                <input class="block w-full px-4 py-3 bg-transparent border-b-2 border-gray-200 dark:border-gray-600 text-text-light dark:text-text-dark placeholder-subtext-light dark:placeholder-subtext-dark focus:outline-none focus:border-primary transition-colors duration-300" id="email" name="email" placeholder="Email Address" required="" type="email" />
                <p class="error-message mt-1 text-sm text-red-500" id="email-error"></p>
              </div>
              <div>
                <label class="sr-only" for="phone">Phone Number</label>
                <input class="block w-full px-4 py-3 bg-transparent border-b-2 border-gray-200 dark:border-gray-600 text-text-light dark:text-text-dark placeholder-subtext-light dark:placeholder-subtext-dark focus:outline-none focus:border-primary transition-colors duration-300" id="phone" name="phone" placeholder="Phone Number" required="" type="tel" />
                <p class="error-message mt-1 text-sm text-red-500" id="phone-error"></p>
              </div>
              <div class="pt-4">
                <button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-md text-lg font-semibold text-white dark:text-background-dark bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary focus:ring-offset-background-light dark:focus:ring-offset-background-dark transition-all duration-300 transform hover:scale-105" type="submit">
                  Join the Waitlist
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    <footer class="w-full max-w-7xl mx-auto py-6 text-center text-sm text-subtext-light dark:text-subtext-dark">
      <p>© 2024 Hei Hai Capital. All Rights Reserved.</p>
      <p>Pioneering the future of elite financial technology.</p>
    </footer>
  </div>
  <div class="alert-banner fixed bottom-4 right-4 bg-green-500/10 backdrop-blur-sm p-4 text-center z-50 text-green-700 dark:text-green-300 border border-green-500/20 rounded-lg shadow-lg" id="success-alert">
    <div class="flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
        </svg>
        <p class="font-medium">Success! You've been added to the waitlist.</p>
      </div>
      <button class="text-green-700 dark:text-green-300 hover:text-green-900 dark:hover:text-green-100" id="close-alert">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" fill-rule="evenodd"></path>
        </svg>
      </button>
    </div>
  </div>
  <script>
    const scrollElements = document.querySelectorAll('.scroll-reveal');
    const elementInView = (el, dividend = 1) => {
      const elementTop = el.getBoundingClientRect().top;
      return (
        elementTop <=
        (window.innerHeight || document.documentElement.clientHeight) / dividend
      );
    };
    const displayScrollElement = (element) => {
      element.classList.add('visible');
    };
    const hideScrollElement = (element) => {
      element.classList.remove('visible');
    }
    const handleScrollAnimation = () => {
      scrollElements.forEach((el) => {
        if (elementInView(el, 1.25)) {
          displayScrollElement(el);
        }
      })
    }
    window.addEventListener('scroll', () => {
      handleScrollAnimation();
    })
    // Initial check
    handleScrollAnimation();
    const form = document.getElementById('contactForm');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const emailError = document.getElementById('email-error');
    const phoneError = document.getElementById('phone-error');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\+?(\d{1,3})?[-.\s]?(\(?\d{1,4}\)?)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/;
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      let isEmailValid = true;
      let isPhoneValid = true;

      const normal_style = ["border-gray-200", "dark:border-gray-600"];
      const error_style = ["border-red-500", "dark:border-red-700"];

      // Reset errors
      emailError.textContent = '';
      emailError.style.display = 'none';
      emailInput.classList.remove(error_style);
      phoneError.textContent = '';
      phoneError.style.display = 'none';
      phoneInput.classList.remove(error_style);

      // Validate email
      if (emailInput.value.trim() === '') {
        emailError.textContent = 'Email address is required.';
        emailError.style.display = 'block';
        emailInput.classList.remove(...normal_style);
        emailInput.classList.add(...error_style);
        isEmailValid = false;
      } else if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Please enter a valid email address.';
        emailError.style.display = 'block';
        emailInput.classList.remove(...normal_style);
        emailInput.classList.add(...error_style);
        isEmailValid = false;
      }

      // Validate phone
      if (phoneInput.value && !phoneRegex.test(phoneInput.value.replace(/\s/g, ''))) {
        phoneError.textContent = 'Please enter a valid phone number.';
        phoneError.style.display = 'block';
        phoneInput.classList.remove(...normal_style);
        phoneInput.classList.add(...error_style);
        isPhoneValid = false;
      }

      if (!isEmailValid || !isPhoneValid) {
        return;
      }

      // Disable form while submitting
      const submitButton = contactForm.querySelector('button[type="submit"]');
      submitButton.disabled = true;
      submitButton.innerHTML = 'Submitting...';

      // Create FormData object
      const formData = new FormData();
      formData.append('name', contactForm.elements['name'].value.trim());
      formData.append('email', emailInput.value.trim());
      formData.append('phone', phoneInput.value.trim());

      // Send data to backend using FormData
      fetch('/api/contacts', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          // Reset form
          contactForm.reset();

          // Show success message
          showAlert();
        })
        .catch(error => {
          if (error.response?.status === 422) {
            // Handle validation errors
            error.response.json().then(data => {
              Object.keys(data.errors).forEach(field => {
                const errorMessage = data.errors[field][0];
                // Show error message for the field
                const errorElement = document.getElementById(`${field}-error`);
                if (errorElement) {
                  const error_style = ["border-red-500", "dark:border-red-700"];
                  errorElement.classList.add(...error_style);
                  errorElement.textContent = errorMessage;
                  errorElement.style.display = 'block';
                }
              });
            });
          } else {
            console.error('Error:', error);
          }
        })
        .finally(() => {
          // Re-enable form
          submitButton.disabled = false;
          submitButton.innerHTML = 'Notify Me';
        });
    });


    const successAlert = document.getElementById('success-alert');
    const closeAlertButton = document.getElementById('close-alert');
    let alertTimeout;
    const showAlert = () => {
      clearTimeout(alertTimeout);
      successAlert.classList.add('show');
      alertTimeout = setTimeout(() => {
        hideAlert();
      }, 5000); // Auto-hide after 5 seconds
    };
    const hideAlert = () => {
      successAlert.classList.remove('show');
    };
    closeAlertButton.addEventListener('click', () => {
      clearTimeout(alertTimeout);
      hideAlert();
    });
  </script>
</body>

</html>