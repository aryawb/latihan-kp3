/*
    Copyright (c) 2020 - present, DITDOT Ltd. - MIT Licence
    https://www.ditdot.hr/en
    https://github.com/ditdot-dev/dark-mode-example
    */

    function load() {
      "use strict";

      const switcher = document.querySelector(".dark-button");
      const title = document.querySelector(".title");
      const logo = document.querySelector(".logo");
      // const h5 = document.h5;
      // const h6 = document.h6;
      const areadarks = document.querySelectorAll('.type-chat > .area-dark');
      const sidebarrights = document.querySelectorAll('.sidebar-right-profile');
      const headrooms = document.querySelectorAll('.head-room-chat');
      const textlefts = document.querySelectorAll('.text-chat-left');
      const textrights = document.querySelectorAll('.text-chat-right');
      const cards = document.querySelectorAll('.card');
      const boxlistchats = document.querySelectorAll('.box-list-chat');
      const accordions = document.querySelectorAll('.accordion');
      const accordionsettings = document.querySelectorAll('.accordion-setting');
      const names = document.querySelectorAll('.name');
      const labelsettings = document.querySelectorAll('.label-setting');
      const searchdarks = document.querySelectorAll('.search-dark');
      const bxdots = document.querySelectorAll('.bx-dots-horizontal-rounded');
      const smallmessages = document.querySelectorAll('.small-messages');
      const inputprofiles = document.querySelectorAll('.input-profile');
      const boxinsideleft = document.querySelector('.box-inside-left');
      const sidebarleft = document.querySelector('.sidebar-left-profile');
      const sidebar = document.querySelector('.sidebar');
      const searchs = document.querySelectorAll('.search-box');
      const tooltips = document.querySelectorAll('.tooltip');
      const navbar = document.querySelector('.navbar');
      const navlinks = document.querySelectorAll('.nav-link');
      const boxbios = document.querySelectorAll('.box-bio-profile');
      ;

  // Checks & unchecks the switcher
  function checkToggle(check) {
    switcher.checked = check;
  }

  // Toggles the "dark-mode" class based on if the media query matches
  function toggleDarkMode(state) {
    checkToggle(state);

    const hasClass = document.body.classList.contains("dark-mode");
    
    if (state) {
      if (!hasClass) {
        document.body.classList.add("dark-mode");
        sidebar.classList.add('dark-mode');
        sidebar.classList.add('border-right-dark');
        navbar.classList.add('dark-mode');
        sidebarleft.classList.add('dark-mode');
        sidebarleft.classList.add('border-right-dark');
        navbar.classList.add('border-bottom-dark');
        boxinsideleft.classList.add("dark-mode-box-inside-left");
        for (const areadark of areadarks) {
         areadark.classList.add('bg-search');
       }
       for (const boxbio of boxbios) {
         boxbio.classList.add('border-bottom-dark');
       }
       for (const sidebarright of sidebarrights) {
        sidebarright.classList.add("dark-mode");
        sidebarright.classList.add("border-left-dark");
      }
      for (const headroom of headrooms) {
        headroom.classList.add("bg-head-room");
      }
      for (const textleft of textlefts) {
        textleft.classList.replace('text-chat-left','text-left-dark');
      }

      for (const textright of textrights) {
        textright.classList.replace('text-chat-right','text-right-dark');
      }
      for (const accordionsetting of accordionsettings) {
        accordionsetting.classList.add('border-top-dark');
      }
      for (const inputprofile of inputprofiles) {
        inputprofile.classList.add('border-bottom-dark');
        inputprofile.classList.add('text-white');
      }
      for (const navlink of navlinks) {
        navlink.classList.add('text-white');
      }
      for (const tooltip of tooltips) {
        tooltip.classList.add('dark-mode');
        tooltip.style.cssText = "box-shadow: 0 5px 10px rgb(92,92,92,0.3);";

      }
      for (const accordion of accordions) {
        accordion.classList.add("border-top-dark");
      }
      for (const labelsetting of labelsettings) {
        labelsetting.classList.add("label-setting-dark");
      }
      for (const searchdark of searchdarks) {
        searchdark.classList.add("bg-search");
      }
      for (const card of cards) {
        card.classList.add("card-dark-mode");
      }
      for (const boxlistchat of boxlistchats) {
        boxlistchat.classList.add("box-list-chat-dark-mode");
      }
      for (const name of names) {
        name.classList.add("text-white");
      }
      for (const smallmessage of smallmessages) {
        smallmessage.classList.add("text-color-sec");
      }
      for (const bxdot of bxdots) {
        bxdot.classList.add("text-color-sec");
      }
      for (const search of searchs) {
        search.classList.add("border-0");
      }
    }


  } else {
    if (hasClass) {
      document.body.classList.remove("dark-mode");
      sidebar.classList.remove('dark-mode');
      sidebar.classList.remove('border-right-dark');
      navbar.classList.remove('dark-mode');
      sidebarleft.classList.remove('dark-mode');
      sidebarleft.classList.remove('border-right-dark');
      navbar.classList.remove('border-bottom-dark');
      boxinsideleft.classList.remove("dark-mode-box-inside-left");
      for (const boxbio of boxbios) {
       boxbio.classList.remove('border-bottom-dark');
     }
     for (const areadark of areadarks) {
       areadark.classList.remove('bg-search');
     }
     for (const sidebarright of sidebarrights) {
      sidebarright.classList.remove("dark-mode");
      sidebarright.classList.remove("border-left-dark");
    }

    for (const headroom of headrooms) {
      headroom.classList.remove("bg-head-room");
    }
    for (const textleft of textlefts) {
          // textleft.classList.replace('text-chat-left','text-left-dark');
          textleft.classList.replace('text-left-dark','text-chat-left');
        }

        for (const textright of textrights) {
          textright.classList.replace('text-right-dark','text-chat-right');
          // textright.classList.replace('text-chat-right','text-right-dark');
        }
        for (const accordionsetting of accordionsettings) {
          accordionsetting.classList.remove('border-top-dark');
        }
        for (const inputprofile of inputprofiles) {
          inputprofile.classList.remove('border-bottom-dark');
          inputprofile.classList.remove('text-white');
        }
        for (const navlink of navlinks) {
          navlink.classList.remove('text-white');
        }
        for (const tooltip of tooltips) {
          tooltip.classList.remove('dark-mode');
        }
        for (const accordion of accordions) {
          accordion.classList.remove("border-top-dark");
        }
        for (const labelsetting of labelsettings) {
          labelsetting.classList.remove("label-setting-dark");
        }
        for (const searchdark of searchdarks) {
          searchdark.classList.remove("bg-search");
        }
        for (const card of cards) {
          card.classList.remove("card-dark-mode");
        }
        for (const boxlistchat of boxlistchats) {
          boxlistchat.classList.remove("box-list-chat-dark-mode");
        }
        for (const name of names) {
          name.classList.remove("text-white");
        }
        for (const smallmessage of smallmessages) {
          smallmessage.classList.remove("text-color-sec");
        }
        for (const bxdot of bxdots) {
          bxdot.classList.remove("text-color-sec");
        }
        for (const search of searchs) {
          search.classList.remove("border-0");
        }
      }


    }
  }

  // MediaQueryList object
  const useDark = window.matchMedia("(prefers-color-scheme: dark)");
  let darkModeState = useDark.matches;

  // Listen for changes in the OS settings
  // addListener is used because older versions of Safari don't support addEventListener
  useDark.addListener(function(evt) {
    toggleDarkMode(evt.matches);
  });

  // Initial setting depending on the prefers-color-mode
  toggleDarkMode(darkModeState);

  function switchListener() {
    darkModeState = !darkModeState;
    toggleDarkMode(darkModeState);
  }

  // Listen for switch change
  switcher.addEventListener("change", switchListener);
}

document.addEventListener("DOMContentLoaded", load);

/*  Rocket logo animation is based on the CSS Motion Path properties
    (offset-*) which are not supported by Safari browsers.
    A possible solution for animation along a motion path is Greensock
    MotionPathPlugin https://greensock.com/motionpath
    */
