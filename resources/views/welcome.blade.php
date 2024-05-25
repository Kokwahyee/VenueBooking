<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sports & Event Booking</title>
    <meta property="og:title" content="Sports & Event Booking" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style>
        :root {
  --dl-size-size-large: 144px;
  --dl-size-size-small: 48px;
  --dl-size-size-medium: 96px;
  --dl-size-size-xlarge: 192px;
  --dl-size-size-xsmall: 16px;
  --dl-space-space-unit: 16px;
  --dl-size-size-xxlarge: 288px;
  --dl-size-size-maxwidth: 1400px;
  --dl-color-theme-accent1: #F3E8E2;
  --dl-color-theme-accent2: #D8BFAF;
  --dl-radius-radius-round: 50%;
  --dl-color-theme-primary1: #D1510A;
  --dl-color-theme-primary2: #923A06;
  --dl-space-space-halfunit: 8px;
  --dl-space-space-sixunits: 96px;
  --dl-space-space-twounits: 32px;
  --dl-radius-radius-radius2: 2px;
  --dl-radius-radius-radius4: 4px;
  --dl-radius-radius-radius8: 8px;
  --dl-space-space-fiveunits: 80px;
  --dl-space-space-fourunits: 64px;
  --dl-color-theme-secondary1: #F3E8E2;
  --dl-color-theme-secondary2: #E0D1CB;
  --dl-space-space-threeunits: 48px;
  --dl-color-theme-neutral-dark: #191818;
  --dl-radius-radius-cardradius: 8px;
  --dl-color-theme-neutral-light: #FBFAF9;
  --dl-radius-radius-card-radius: 8px;
  --dl-radius-radius-imageradius: 8px;
  --dl-radius-radius-inputradius: 24px;
  --dl-radius-radius-buttonradius: 24px;
  --dl-radius-radius-image-radius: 8px;
  --dl-radius-radius-input-radius: 24px;
  --dl-radius-radius-button-radius: 24px;
  --dl-space-space-oneandhalfunits: 24px;
}
.button {
  color: var(--dl-color-theme-neutral-dark);
  display: inline-block;
  padding: 0.5rem 1rem;
  border-color: var(--dl-color-theme-neutral-dark);
  border-width: 1px;
  border-radius: 4px;
  background-color: var(--dl-color-theme-neutral-light);
}
.input {
  color: var(--dl-color-theme-neutral-dark);
  cursor: auto;
  padding: 0.5rem 1rem;
  border-color: var(--dl-color-theme-neutral-dark);
  border-width: 1px;
  border-radius: 4px;
  background-color: var(--dl-color-theme-neutral-light);
}
.textarea {
  color: var(--dl-color-theme-neutral-dark);
  cursor: auto;
  padding: 0.5rem;
  border-color: var(--dl-color-theme-neutral-dark);
  border-width: 1px;
  border-radius: 4px;
  background-color: var(--dl-color-theme-neutral-light);
}
.list {
  width: 100%;
  margin: 1em 0px 1em 0px;
  display: block;
  padding: 0px 0px 0px 1.5rem;
  list-style-type: none;
  list-style-position: outside;
}
.list-item {
  display: list-item;
}
.teleport-show {
  display: flex !important;
  transform: none !important;
}
.thq-input {
  color: var(--dl-color-theme-neutral-dark);
  cursor: auto;
  padding: 0.5rem 1rem;
  align-self: stretch;
  text-align: center;
  border-color: var(--dl-color-theme-neutral-dark);
  border-width: 1px;
  background-color: var(--dl-color-theme-neutral-light);
}
.thq-button-filled {
  color: var(--dl-color-theme-secondary1);
  cursor: pointer;
  transition: 0.3s;
  font-family: Noto Sans;
  font-weight: bold;
  padding-top: var(--dl-space-space-halfunit);
  white-space: nowrap;
  border-color: var(--dl-color-theme-primary1);
  padding-left: var(--dl-space-space-oneandhalfunits);
  border-radius: var(--dl-radius-radius-button-radius);
  padding-right: var(--dl-space-space-oneandhalfunits);
  padding-bottom: var(--dl-space-space-halfunit);
  background-color: var(--dl-color-theme-primary1);
}
.thq-button-filled:hover {
  color: var(--dl-color-theme-secondary2);
  border-color: var(--dl-color-theme-primary2);
  background-color: var(--dl-color-theme-primary2);
}
.thq-button-outline {
  fill: var(--dl-color-theme-primary1);
  color: var(--dl-color-theme-primary1);
  border: 1px solid;
  cursor: pointer;
  transition: 0.3s;
  font-weight: bold;
  padding-top: var(--dl-space-space-halfunit);
  white-space: nowrap;
  border-color: var(--dl-color-theme-primary1);
  padding-left: var(--dl-space-space-oneandhalfunits);
  border-radius: var(--dl-radius-radius-button-radius);
  padding-right: var(--dl-space-space-oneandhalfunits);
  padding-bottom: var(--dl-space-space-halfunit);
}
.thq-button-outline:hover {
  fill: var(--dl-color-theme-secondary2);
  color: var(--dl-color-theme-secondary2);
  background-color: var(--dl-color-theme-primary2);
}
.thq-button-flat {
  gap: var(--dl-space-space-halfunit);
  fill: var(--dl-color-theme-primary1);
  color: var(--dl-color-theme-primary1);
  cursor: pointer;
  display: flex;
  transition: 0.3s;
  align-items: center;
  font-family: Noto Sans;
  font-weight: bold;
  padding-top: var(--dl-space-space-halfunit);
  padding-left: var(--dl-space-space-oneandhalfunits);
  border-radius: var(--dl-radius-radius-button-radius);
  padding-right: var(--dl-space-space-oneandhalfunits);
  padding-bottom: var(--dl-space-space-halfunit);
}
.thq-button-flat:hover {
  fill: var(--dl-color-theme-secondary1);
  color: var(--dl-color-theme-secondary1);
  border-color: var(--dl-color-theme-primary2);
  background-color: var(--dl-color-theme-primary2);
}
.thq-heading-1 {
  font-size: 48px;
  font-family: STIX Two Text;
  font-weight: 700;
  line-height: 1.5;
}
.thq-heading-2 {
  font-size: 35px;
  font-family: STIX Two Text;
  font-weight: 600;
  line-height: 1.5;
}
.thq-heading-3 {
  font-size: 26px;
  font-family: STIX Two Text;
  font-weight: 600;
  line-height: 1.5;
}
.thq-body-large {
  font-size: 18px;
  line-height: 1.5;
}
.thq-body-small {
  font-size: 16px;
  line-height: 1.5;
}
.thq-team-image-round {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 50%;
}
.thq-section-padding {
  width: 100%;
  display: flex;
  padding: var(--dl-space-space-fiveunits);
  position: relative;
  align-items: center;
  flex-direction: column;
}
.thq-section-max-width {
  width: 100%;
  max-width: var(--dl-size-size-maxwidth);
}
.thq-img-ratio-1-1 {
  width: 100%;
  object-fit: cover;
  aspect-ratio: 1/1;
}
.thq-img-ratio-16-9 {
  width: 100%;
  object-fit: cover;
  aspect-ratio: 16/9;
}
.thq-img-ratio-4-3 {
  width: 100%;
  object-fit: cover;
  aspect-ratio: 4/3;
}
.thq-img-ratio-4-6 {
  width: 100%;
  object-fit: cover;
  aspect-ratio: 4/6;
}
.thq-img-round {
  width: 100%;
  border-radius: var(--dl-radius-radius-round);
}
.thq-flex-column {
  gap: var(--dl-space-space-twounits);
  display: flex;
  overflow: hidden;
  position: relative;
  align-items: center;
  flex-direction: column;
}
.thq-flex-row {
  gap: var(--dl-space-space-twounits);
  display: flex;
  overflow: hidden;
  position: relative;
  align-items: center;
}
.thq-grid-6 {
  display: grid;
  grid-gap: var(--dl-space-space-twounits);
  place-items: center;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
}
.thq-grid-5 {
  display: grid;
  grid-gap: var(--dl-space-space-twounits);
  place-items: center;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
}
.thq-card {
  gap: var(--dl-space-space-oneandhalfunits);
  display: flex;
  padding: var(--dl-space-space-twounits);
  align-items: stretch;
  flex-direction: column;
}
.thq-box-shadow {
  box-shadow: 5px 5px 10px 0px #d4d4d4;
}
.thq-grid-3 {
  display: grid;
  grid-gap: var(--dl-space-space-twounits);
  place-items: center;
  grid-template-columns: 1fr 1fr 1fr;
}
.thq-grid-4 {
  display: grid;
  grid-gap: var(--dl-space-space-twounits);
  place-items: center;
  grid-template-columns: 1fr 1fr 1fr 1fr;
}
.thq-grid-2 {
  width: 100%;
  display: grid;
  grid-gap: var(--dl-space-space-twounits);
  place-items: center;
  grid-template-columns: 1fr 1fr;
}
.thq-checkbox {
  width: var(--dl-size-size-xsmall);
  height: var(--dl-size-size-xsmall);
}
.thq-select {
  cursor: pointer;
  appearance: none;
  padding-top: var(--dl-space-space-halfunit);
  padding-left: var(--dl-space-space-unit);
  padding-right: var(--dl-space-space-twounits);
  padding-bottom: var(--dl-space-space-halfunit);
  background-color: var(--dl-color-theme-neutral-light);
  background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg width%3D%2220%22 height%3D%2220%22 xmlns%3D%22http%3A//www.w3.org/2000/svg%22 viewBox%3D%220 0 20 20%22 fill%3D%22%23000%22%3E%3Cpath d%3D%22M4.293 7.293a1 1 0 011.414 0L10 11.586l4.293-4.293a1 1 0 111.414 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414z%22/%3E%3C/svg%3E');
  background-repeat: no-repeat;
  background-position: right 8px center;
}
.thq-divider-horizontal {
  width: 100%;
  height: 1px;
  background-color: var(--dl-color-theme-neutral-dark);
}
.thq-icon-small {
  width: 24px;
  height: 24px;
}
.thq-button-icon {
  fill: var(--dl-color-theme-secondary1);
  padding: var(--dl-space-space-halfunit);
  transition: 0.3s;
  font-family: Noto Sans;
  border-radius: var(--dl-radius-radius-button-radius);
}
.thq-button-icon:hover {
  fill: var(--dl-color-theme-secondary2);
}
.thq-icon-medium {
  width: var(--dl-size-size-small);
  height: var(--dl-size-size-small);
}
.thq-icon-x-small {
  width: var(--dl-size-size-xsmall);
  height: var(--dl-size-size-xsmall);
}
.thq-link {
  cursor: pointer;
  transition: 0.3s;
  font-weight: 600;
}
.thq-link:hover {
  opacity: 0.8;
}
.thq-input::placeholder {
  text-align: center;
  vertical-align: middle;
}
.Content {
  font-size: 16px;
  font-family: Noto Sans;
  font-weight: 400;
  line-height: 1.15;
  text-transform: none;
  text-decoration: none;
}
@media(max-width: 991px) {
  .thq-flex-row {
    flex-direction: column;
  }
  .thq-grid-4 {
    grid-template-columns: 1fr 1fr 1fr;
  }
}
@media(max-width: 767px) {
  .thq-section-padding {
    padding: var(--dl-space-space-threeunits);
  }
  .thq-flex-column {
    gap: var(--dl-space-space-oneandhalfunits);
  }
  .thq-flex-row {
    gap: var(--dl-space-space-oneandhalfunits);
  }
  .thq-grid-6 {
    grid-gap: var(--dl-space-space-oneandhalfunits);
    grid-template-columns: 1fr 1fr 1fr;
  }
  .thq-grid-5 {
    grid-gap: var(--dl-space-space-oneandhalfunits);
    grid-template-columns: 1fr 1fr 1fr;
  }
  .thq-card {
    padding: var(--dl-space-space-oneandhalfunits);
  }
  .thq-grid-3 {
    grid-gap: var(--dl-space-space-oneandhalfunits);
    grid-template-columns: 1fr 1fr;
  }
  .thq-grid-4 {
    grid-gap: var(--dl-space-space-oneandhalfunits);
    flex-direction: row;
    grid-template-columns: 1fr 1fr;
  }
  .thq-grid-2 {
    grid-gap: var(--dl-space-space-oneandhalfunits);
    grid-template-columns: 1fr;
  }
}
@media(max-width: 479px) {
  .thq-section-padding {
    padding: var(--dl-space-space-oneandhalfunits);
  }
  .thq-flex-column {
    gap: var(--dl-space-space-unit);
  }
  .thq-flex-row {
    gap: var(--dl-space-space-unit);
  }
  .thq-grid-6 {
    grid-gap: var(--dl-space-space-unit);
    grid-template-columns: 1fr 1fr;
  }
  .thq-grid-5 {
    grid-gap: var(--dl-space-space-unit);
    grid-template-columns: 1fr 1fr;
  }
  .thq-grid-3 {
    grid-gap: var(--dl-space-space-unit);
    align-items: center;
    grid-template-columns: 1fr;
  }
  .thq-grid-4 {
    grid-gap: var(--dl-space-space-unit);
    align-items: center;
    flex-direction: column;
    grid-template-columns: 1fr;
  }
  .thq-grid-2 {
    grid-gap: var(--dl-space-space-unit);
  }
}

        .navbar4-container {
    width: 100%;
    display: flex;
    position: relative;
    justify-content: center;
    background-color: var(--dl-color-theme-neutral-light);
    }
    .navbar4-navbar-interactive {
    width: 100%;
    display: flex;
    position: relative;
    max-width: var(--dl-size-size-maxwidth);
    align-items: center;
    padding-top: var(--dl-space-space-twounits);
    padding-left: var(--dl-space-space-threeunits);
    padding-right: var(--dl-space-space-threeunits);
    padding-bottom: var(--dl-space-space-twounits);
    justify-content: space-between;
    }
    .navbar4-image1 {
    top: 25px;
    left: 2px;
    height: 3rem;
    position: absolute;
    }
    .navbar4-desktop-menu {
    flex: 1;
    display: flex;
    justify-content: space-between;
    }
    .navbar4-links {
    gap: var(--dl-space-space-twounits);
    flex: 1;
    display: flex;
    align-items: center;
    margin-left: var(--dl-space-space-twounits);
    flex-direction: row;
    justify-content: flex-start;
    }
    .navbar4-buttons {
    gap: var(--dl-space-space-twounits);
    display: flex;
    align-items: center;
    margin-left: var(--dl-space-space-twounits);
    }
    .navbar4-burger-menu {
    display: none;
    }
    .navbar4-icon {
    width: var(--dl-size-size-xsmall);
    height: var(--dl-size-size-xsmall);
    }
    .navbar4-mobile-menu {
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100vh;
    display: none;
    padding: var(--dl-space-space-twounits);
    z-index: 100;
    position: absolute;
    flex-direction: column;
    background-color: var(--dl-color-theme-neutral-light);
    }
    .navbar4-nav {
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    }
    .navbar4-top {
    width: 100%;
    display: flex;
    align-items: center;
    margin-bottom: var(--dl-space-space-threeunits);
    justify-content: space-between;
    }
    .navbar4-logo {
    height: 3rem;
    }
    .navbar4-close-menu {
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .navbar4-icon2 {
    width: var(--dl-size-size-xsmall);
    height: var(--dl-size-size-xsmall);
    }
    .navbar4-links1 {
    gap: var(--dl-space-space-unit);
    flex: 0 0 auto;
    display: flex;
    align-self: flex-start;
    align-items: flex-start;
    flex-direction: column;
    }
    .navbar4-buttons1 {
    gap: var(--dl-space-space-twounits);
    display: flex;
    margin-top: var(--dl-space-space-twounits);
    align-items: center;
    }
    .navbar4-root-class-name {
    top: 100px;
    left: 1px;
    position: absolute;
    background-color: var(--dl-color-theme-neutral-light);
    background-image: linear-gradient(to right, #bdc3c7 0%, #2c3e50 100%);
    }
    @media(max-width: 767px) {
    .navbar4-navbar-interactive {
        padding-left: var(--dl-space-space-twounits);
        padding-right: var(--dl-space-space-twounits);
    }
    .navbar4-desktop-menu {
        display: none;
    }
    .navbar4-burger-menu {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    }
    @media(max-width: 479px) {
    .navbar4-navbar-interactive {
        padding: var(--dl-space-space-unit);
    }
    .navbar4-mobile-menu {
        padding: var(--dl-space-space-unit);
    }
    }

    .footer3-footer4 {
    gap: 80px;
    width: 100%;
    height: 131px;
    display: flex;
    padding: var(--dl-space-space-fiveunits);
    overflow: hidden;
    position: relative;
    align-items: flex-start;
    flex-shrink: 0;
    flex-direction: column;
    justify-content: center;
    }
    .footer3-max-width {
    gap: var(--dl-space-space-threeunits);
    display: flex;
    align-items: center;
    flex-direction: column;
    }
    .footer3-content {
    gap: 32px;
    display: flex;
    align-self: stretch;
    align-items: center;
    flex-shrink: 0;
    justify-content: center;
    }
    .footer3-logo {
    gap: 24px;
    width: auto;
    display: flex;
    overflow: hidden;
    flex-grow: 1;
    align-items: flex-start;
    flex-shrink: 0;
    flex-direction: column;
    }
    .footer3-image1 {
    height: 2rem;
    align-self: flex-end;
    }
    .footer3-links {
    gap: var(--dl-space-space-twounits);
    display: flex;
    align-items: flex-start;
    }
    .footer3-social-links {
    gap: var(--dl-space-space-unit);
    display: flex;
    flex-grow: 1;
    align-items: center;
    justify-content: flex-end;
    }
    .footer3-credits {
    gap: var(--dl-space-space-twounits);
    display: flex;
    align-self: stretch;
    align-items: center;
    flex-direction: column;
    }
    .footer3-row {
    gap: 24px;
    display: flex;
    position: relative;
    align-items: flex-start;
    }
    .footer3-footer-links {
    gap: var(--dl-space-space-oneandhalfunits);
    top: -14px;
    left: -273px;
    width: 638px;
    height: 30px;
    display: flex;
    position: absolute;
    align-items: flex-start;
    }
    .footer3-root-class-name {
    left: -1px;
    bottom: 27px;
    position: absolute;
    }
    @media(max-width: 991px) {
    .footer3-logo {
        width: auto;
    }
    }
    @media(max-width: 767px) {
    .footer3-content {
        flex-direction: column;
    }
    .footer3-row {
        flex-direction: column;
    }
    .footer3-footer-links {
        align-items: center;
        flex-direction: column;
        justify-content: center;
    }
    }
    @media(max-width: 479px) {
    .footer3-max-width {
        gap: var(--dl-space-space-oneandhalfunits);
    }
    .footer3-content {
        width: 100%;
    }
    .footer3-links {
        width: 100%;
        align-items: center;
        flex-direction: column;
        justify-content: center;
    }
    }

    .banner11-container {
    gap: var(--dl-space-space-unit);
    height: 1004px;
    display: flex;
    position: relative;
    align-items: flex-start;
    padding-top: 0px;
    border-color: #191818;
    border-width: 1px;
    padding-left: 0px;
    padding-right: 0px;
    flex-direction: column;
    padding-bottom: 0px;
    background-size: cover;
    justify-content: center;
    background-image: linear-gradient(45deg, rgb(189, 195, 199) 0.00%,rgb(76, 8, 242) 99.00%);
    }
    .banner11-title {
    top: 19px;
    left: 0px;
    right: 0px;
    width: 621px;
    margin: auto;
    position: absolute;
    text-align: center;
    }
    .banner11-slider {
    width: 1531px;
    height: 601px;
    display: inline-block;
    padding-right: 12px;
    }
    .banner11-slider-slide {
    display: flex;
    background-size: cover;
    background-image: url("{{ URL::to('/') }}/images/image1-1600w.jpg");
    }
    .banner11-slider-slide1 {
    display: flex;
    background-size: cover;
    background-image: url("{{ URL::to('/') }}/images/image2-1600w.jpeg");
    }
    .banner11-slider-slide2 {
    display: flex;
    background-size: cover;
    background-image: url("{{ URL::to('/') }}/images/image3-1600w.jpeg");
    }
    .banner11-slider-slide3 {
    display: flex;
    background-size: cover;
    background-image: url("{{ URL::to('/') }}/images/image4-1600w.jpeg");
    }
    .banner11-slider-slide4 {
    display: flex ;
    background-size: cover;
    background-image: url("{{ URL::to('/') }}/images/image5-1600w.jpg");
    }
    .banner11-slider-slide5 {
    display: flex ;
    background-size: cover;
    background-image: url("{{ URL::to('/') }}/images/image6-1600w.jpg");
    }
    .banner11-slider-pagination {
    display: block;
    }
    .banner11-slider-button-prev {
    display: block;
    }
    .banner11-slider-button-next {
    display: block;
    }
    @media(max-width: 1200px) {
    .banner11-container {
        background-image: linear-gradient(45deg, rgb(189, 195, 199) 0.00%,rgb(0, 88, 253) 99.00%);
    }
    }

    .home-container {
    width: 100%;
    display: flex;
    overflow: auto;
    min-height: 100vh;
    align-items: center;
    flex-direction: column;
    }
    </style>
    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Noto Sans;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-theme-neutral-dark);
        background-color: var(--dl-color-theme-neutral-light);

        fill: var(--dl-color-theme-neutral-dark);
      }
    </style>
    <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
    />
  </head>
  <body>
    <link rel="stylesheet" href="./style.css" />
    <div>
      

      <div class="home-container">
        <div class="banner11-container thq-section-padding">
          <h2 class="banner11-title thq-heading-2">
            <span>Sports &amp; Event Booking System</span>
          </h2>
          <div class="navbar4-container navbar4-root-class-name">
            <header data-thq="thq-navbar" class="navbar4-navbar-interactive">
              <img
                alt="logo"
                src="{{ URL::to('/') }}/images/picture1-1500h.png"
                class="navbar4-image1"
              />
              <div data-thq="thq-navbar-nav" class="navbar4-desktop-menu">
                <nav class="navbar4-links">
                  <span class="thq-body-small thq-link"><span><a href="{{ route('login') }}" >Home</a></span></span>
                  <span class="thq-body-small thq-link">
                    <span><a href="venue" >Venue</a></span>
                  </span>
                  <span class="thq-body-small thq-link">
                    <span><a href="{{ route('login') }}" >Booking</a></span>
                  </span>
                  <span class="thq-body-small thq-link">
                    <span><a href="{{ route('login') }}" >About Us</a></span>
                  </span>
                  <span class="thq-body-small thq-link">
                    <span>Contact</span>
                  </span>
                </nav>
                @if (Route::has('login'))
                    <div class="navbar4-buttons">
                        @auth
                        <button class="thq-button-filled"><span><a href="{{ url('/dashboard') }}">Dashboard</a></span></button>
                        @else
                        <button class="thq-button-filled"><span><a href="{{ route('login') }}" >Log in</a></span></button>

                            @if (Route::has('register'))
                            <button class="thq-button-filled"><span><a href="{{ route('register') }}" >Register</a></span></button>
                            @endif
                        @endauth
                    </div>
                @endif
              </div>
              <div data-thq="thq-burger-menu" class="navbar4-burger-menu">
                <svg viewBox="0 0 1024 1024" class="navbar4-icon">
                  <path
                    d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"
                  ></path>
                </svg>
              </div>
              <div data-thq="thq-mobile-menu" class="navbar4-mobile-menu">
                <div class="navbar4-nav">
                  <div class="navbar4-top">
                    <img
                      alt="logo"
                      src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/84ec08e8-34e9-42c7-9445-d2806d156403/fac575ac-7a41-484f-b7ac-875042de11f8?org_if_sml=1&amp;force_format=original"
                      class="navbar4-logo"
                    />
                    <div data-thq="thq-close-menu" class="navbar4-close-menu">
                      <svg viewBox="0 0 1024 1024" class="navbar4-icon2">
                        <path
                          d="M810 274l-238 238 238 238-60 60-238-238-238 238-60-60 238-238-238-238 60-60 238 238 238-238z"
                        ></path>
                      </svg>
                    </div>
                  </div>
                  <nav class="navbar4-links1">
                    <span class="thq-body-small thq-link">
                      <span>Home</span>
                    </span>
                    <span class="thq-body-small thq-link">
                      <span>Venue</span>
                    </span>
                    <span class="thq-body-small thq-link">
                      <span>Booking</span>
                    </span>
                    <span class="thq-body-small thq-link">
                      <span>About Us</span>
                    </span>
                    <span class="thq-body-small thq-link">
                      <span>Contact</span>
                    </span>
                  </nav>
                </div>
                <div class="navbar4-buttons1">
                    
                </div>
              </div>
            </header>
          </div>
          <div
            data-thq="slider"
            data-loop="false"
            data-autoplay="true"
            data-navigation="true"
            data-pagination="true"
            class="banner11-slider swiper"
          >
            <div data-thq="slider-wrapper" class="swiper-wrapper">
              <div
                data-thq="slider-slide"
                class="banner11-slider-slide swiper-slide"
              ></div>
              <div
                data-thq="slider-slide"
                class="banner11-slider-slide1 swiper-slide"
              ></div>
              <div
                data-thq="slider-slide"
                class="banner11-slider-slide2 swiper-slide"
              ></div>
              <div
                data-thq="slider-slide"
                class="banner11-slider-slide3 swiper-slide"
              ></div>
              <div
                data-thq="slider-slide"
                class="banner11-slider-slide4 swiper-slide"
              ></div>
              <div
                data-thq="slider-slide"
                class="banner11-slider-slide5 swiper-slide"
              ></div>
            </div>
            <div
              data-thq="slider-pagination"
              class="banner11-slider-pagination swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal"
            >
              <div
                data-thq="slider-pagination-bullet"
                class="swiper-pagination-bullet swiper-pagination-bullet-active"
              ></div>
              <div
                data-thq="slider-pagination-bullet"
                class="swiper-pagination-bullet"
              ></div>
              <div
                data-thq="slider-pagination-bullet"
                class="swiper-pagination-bullet"
              ></div>
              <div
                data-thq="slider-pagination-bullet"
                class="swiper-pagination-bullet"
              ></div>
              <div
                data-thq="slider-pagination-bullet"
                class="swiper-pagination-bullet"
              ></div>
            </div>
            <div
              data-thq="slider-button-prev"
              class="banner11-slider-button-prev swiper-button-prev"
            ></div>
            <div
              data-thq="slider-button-next"
              class="banner11-slider-button-next swiper-button-next"
            ></div>
          </div>
          <div
            class="footer3-footer4 thq-section-padding footer3-root-class-name"
          >
            <div class="footer3-max-width thq-section-max-width">
              <div class="footer3-content">
                <div class="footer3-logo">
                  <img
                    alt="Logo"
                    src="{{ URL::to('/') }}/images/picture1-1500h.png"
                    class="footer3-image1"
                  />
                </div>
                <div class="footer3-links">
                  <span class="thq-body-small"><span>Home</span></span>
                  <span class="thq-body-small"><span>FAQs</span></span>
                  <span class="thq-body-small"><span>Events</span></span>
                  <span class="thq-body-small"><span>About Us</span></span>
                  <span class="thq-body-small"><span>Contact Us</span></span>
                </div>
                <div class="footer3-social-links">
                  <svg
                    viewBox="0 0 877.7142857142857 1024"
                    class="thq-icon-small"
                  >
                    <path
                      d="M713.143 73.143c90.857 0 164.571 73.714 164.571 164.571v548.571c0 90.857-73.714 164.571-164.571 164.571h-107.429v-340h113.714l17.143-132.571h-130.857v-84.571c0-38.286 10.286-64 65.714-64l69.714-0.571v-118.286c-12-1.714-53.714-5.143-101.714-5.143-101.143 0-170.857 61.714-170.857 174.857v97.714h-114.286v132.571h114.286v340h-304c-90.857 0-164.571-73.714-164.571-164.571v-548.571c0-90.857 73.714-164.571 164.571-164.571h548.571z"
                    ></path></svg
                  ><svg
                    viewBox="0 0 877.7142857142857 1024"
                    class="thq-icon-small"
                  >
                    <path
                      d="M585.143 512c0-80.571-65.714-146.286-146.286-146.286s-146.286 65.714-146.286 146.286 65.714 146.286 146.286 146.286 146.286-65.714 146.286-146.286zM664 512c0 124.571-100.571 225.143-225.143 225.143s-225.143-100.571-225.143-225.143 100.571-225.143 225.143-225.143 225.143 100.571 225.143 225.143zM725.714 277.714c0 29.143-23.429 52.571-52.571 52.571s-52.571-23.429-52.571-52.571 23.429-52.571 52.571-52.571 52.571 23.429 52.571 52.571zM438.857 152c-64 0-201.143-5.143-258.857 17.714-20 8-34.857 17.714-50.286 33.143s-25.143 30.286-33.143 50.286c-22.857 57.714-17.714 194.857-17.714 258.857s-5.143 201.143 17.714 258.857c8 20 17.714 34.857 33.143 50.286s30.286 25.143 50.286 33.143c57.714 22.857 194.857 17.714 258.857 17.714s201.143 5.143 258.857-17.714c20-8 34.857-17.714 50.286-33.143s25.143-30.286 33.143-50.286c22.857-57.714 17.714-194.857 17.714-258.857s5.143-201.143-17.714-258.857c-8-20-17.714-34.857-33.143-50.286s-30.286-25.143-50.286-33.143c-57.714-22.857-194.857-17.714-258.857-17.714zM877.714 512c0 60.571 0.571 120.571-2.857 181.143-3.429 70.286-19.429 132.571-70.857 184s-113.714 67.429-184 70.857c-60.571 3.429-120.571 2.857-181.143 2.857s-120.571 0.571-181.143-2.857c-70.286-3.429-132.571-19.429-184-70.857s-67.429-113.714-70.857-184c-3.429-60.571-2.857-120.571-2.857-181.143s-0.571-120.571 2.857-181.143c3.429-70.286 19.429-132.571 70.857-184s113.714-67.429 184-70.857c60.571-3.429 120.571-2.857 181.143-2.857s120.571-0.571 181.143 2.857c70.286 3.429 132.571 19.429 184 70.857s67.429 113.714 70.857 184c3.429 60.571 2.857 120.571 2.857 181.143z"
                    ></path></svg
                  ><svg
                    viewBox="0 0 950.8571428571428 1024"
                    class="thq-icon-small"
                  >
                    <path
                      d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"
                    ></path></svg
                  ><svg
                    viewBox="0 0 877.7142857142857 1024"
                    class="thq-icon-small"
                  >
                    <path
                      d="M135.429 808h132v-396.571h-132v396.571zM276 289.143c-0.571-38.857-28.571-68.571-73.714-68.571s-74.857 29.714-74.857 68.571c0 37.714 28.571 68.571 73.143 68.571h0.571c46.286 0 74.857-30.857 74.857-68.571zM610.286 808h132v-227.429c0-121.714-65.143-178.286-152-178.286-70.857 0-102.286 39.429-119.429 66.857h1.143v-57.714h-132s1.714 37.143 0 396.571v0h132v-221.714c0-11.429 0.571-23.429 4-32 9.714-23.429 31.429-48 68-48 47.429 0 66.286 36 66.286 89.714v212zM877.714 237.714v548.571c0 90.857-73.714 164.571-164.571 164.571h-548.571c-90.857 0-164.571-73.714-164.571-164.571v-548.571c0-90.857 73.714-164.571 164.571-164.571h548.571c90.857 0 164.571 73.714 164.571 164.571z"
                    ></path></svg
                  ><svg viewBox="0 0 1024 1024" class="thq-icon-small">
                    <path
                      d="M406.286 644.571l276.571-142.857-276.571-144.571v287.429zM512 152c215.429 0 358.286 10.286 358.286 10.286 20 2.286 64 2.286 102.857 43.429 0 0 31.429 30.857 40.571 101.714 10.857 82.857 10.286 165.714 10.286 165.714v77.714s0.571 82.857-10.286 165.714c-9.143 70.286-40.571 101.714-40.571 101.714-38.857 40.571-82.857 40.571-102.857 42.857 0 0-142.857 10.857-358.286 10.857v0c-266.286-2.286-348-10.286-348-10.286-22.857-4-74.286-2.857-113.143-43.429 0 0-31.429-31.429-40.571-101.714-10.857-82.857-10.286-165.714-10.286-165.714v-77.714s-0.571-82.857 10.286-165.714c9.143-70.857 40.571-101.714 40.571-101.714 38.857-41.143 82.857-41.143 102.857-43.429 0 0 142.857-10.286 358.286-10.286v0z"
                    ></path>
                  </svg>
                </div>
              </div>
              <div class="footer3-credits">
                <div class="thq-divider-horizontal"></div>
                <div class="footer3-row">
                  <div class="footer3-footer-links">
                    <span class="thq-body-small">Copyright © 2024</span>
                    <span class="thq-body-small">
                      <span>Privacy Policy</span>
                    </span>
                    <span class="thq-body-small">
                      <span>Terms and Conditions</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>
