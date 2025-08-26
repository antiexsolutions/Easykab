# 🚖 Smart Taxi Booking Plugin for WordPress

A powerful, compact, and mobile-friendly taxi booking plugin for WordPress, fully integrated with Google Maps, WooCommerce, and driver dispatch automation.

## 📌 Project Overview

A powerful, compact, and mobile-friendly taxi booking plugin for WordPress, fully integrated with Google Maps, WooCommerce, and driver dispatch automation.

### Core Features
- Multi-step booking form with Google Places (pickup, drop, up to 3 waypoints)
- Real-time distance & time using Google Directions API (client-side), sequence-aware
- Dynamic fare engine with per-vehicle tiered slabs (CPT-based Vehicles)
- Global discounts for One-way and Round-trip
- Optional Meet & Greet and Waiting Time charges (configurable)
- Driver auto-assignment to nearest active driver within radius
- Driver acceptance link secured with nonce; customer notified on accept
- WooCommerce Checkout integration (guest supported), order meta storage
- Elementor compatibility via shortcode, responsive UI/UX
- Admin: Vehicles (CPT with slabs), Drivers (custom table), Settings panel


## ✅ Current Development Stage

### ✅ Phase 12: Airport Detection + Live Price Preview ✅ Completed
- Client-side airport detection via Places types/keywords, server fallback
- Flight fields auto-toggle for airport trips
- Live price preview for Meet & Greet and Waiting time (settings-driven)
- Server recomputes base + addons; total charged as WooCommerce fee


### ✅ Phase 11: Final Packaging ✅ Completed
- Plugin headers and readme.txt created for WP.org compatibility
- Base translation file (.pot) added for multilingual support
- Final review and cleanup done
- Ready for production deployment


### ✅ Phase 9: Admin Settings Panel ✅ Completed
- Extended admin panel with key settings:
  - Distance metric (KM / Miles)
  - Driver assignment radius
  - Waiting time pricing
  - Meet & Greet toggle and price
  - One-way and round-trip discounts
- Values stored via `get_option()` for global access


### ✅ Phase 8: Email/SMS Notification System ✅ Completed
- Central class created for all email/SMS logic
- HTML email templates for driver assignment and customer confirmation
- Driver gets email with accept link
- Customer gets email after driver accepts with basic info
- SMS function stub added for future API integration


### ✅ Phase 7: Driver Auto Assignment ✅ Completed
- Booking pickup location checked against driver base coordinates
- Nearest active driver (within 20km) auto-assigned after checkout
- Driver receives email with accept link
- Driver click triggers endpoint, marks booking accepted
- Customer receives confirmation email with driver info


### ✅ Phase 6: WooCommerce Checkout Integration ✅ Completed
- Booking data stored in PHP session via AJAX
- On checkout, booking data saved as WooCommerce order meta
- Booking info displayed in admin order view
- Guest checkout compatible
- Added "Continue to Checkout" button to complete booking


### ✅ Phase 5: Quote Display + Booking Detail Form ✅ Completed
- Frontend renders vehicle quotes dynamically
- User can choose one-way or round-trip
- Next step form asks for pickup time, return (if needed), meet & greet, and waiting time
- All fields are mobile-friendly and integrated in a single flow


### ✅ Phase 4: Fare Calculation Engine ✅ Completed
- AJAX backend hooked into “Get Quote”
- Dummy Directions API replaced with fixed distance (for now)
- Dynamic fare calculation per vehicle based on slabs
- Discounts applied for one-way and round-trip


### ✅ Phase 3: Frontend Booking Form (Step 1) ✅ Completed
- Pickup, Drop fields with Google Places Autocomplete
- Add/remove up to 3 waypoints via modal
- Mobile-friendly design with jQuery/JS
- “Get Quote” triggers AJAX request


### ✅ Phase 2: Vehicle Manager + Driver Admin UI + Fare Slabs ✅ Completed
- Vehicle manager UI setup (admin menu)
- Vehicle post type or data handled (basic)
- Driver admin interface created (list, add, edit)
- Fare slabs UI designed for per-vehicle dynamic pricing


### ✅ Phase 1: Setup & DB ✅ Completed
- Plugin initialized
- Admin menu created
- Google API field in settings
- Custom table `wp_stb_drivers` created via activation hook
- `uninstall.php` cleans driver table

> 🔄 **Next Phase:**  
> Phase 2 – Vehicle Manager + Fare Slabs + Driver Admin UI
