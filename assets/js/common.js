
// Initiating All radio-tab groups
(function () {
    let tabTriggers = document.querySelectorAll(".radio-tabs")

    for (let trigger of tabTriggers) {
        let id = trigger.getAttribute("for")
        let tabsContainer = document.querySelector(`#${id}`);
        let tabs = document.querySelectorAll(`#${id} > *`)
        let radios = trigger.querySelectorAll(":scope .radio input")
        for (let index = 0; index < radios.length && index < tabs.length; ++index) {
            tabs[index].style.display = 'none'
            radios[index].checked = false;
            radios[index].addEventListener("change", function (event) {
                for (let tab of tabsContainer.children) {
                    tab.style.display = 'none'
                }
                tabs[index].style.display = '';
            })

        }
        radios[0].checked = true
        tabs[0].style.display = ''
    }
})();


//Iniitating All sidebars
(function () {
    let sidebars = document.querySelectorAll(".sidebar")

    for (let sidebar of sidebars) {

        const sidebarMenuItems = sidebar.querySelectorAll(":scope > .item")
        const id = sidebar.getAttribute('for')
        const sidebarRouteContainer = document.querySelector(`#${id}`)
        const sidebarRouteItems = sidebarRouteContainer.querySelectorAll(":scope > *")
        let hasSelected = false;
        for (let index = 0; index < sidebarMenuItems.length && index < sidebarRouteItems.length; ++index) {
            if (sidebarMenuItems[index].classList.contains("selected")) {
                hasSelected = true;
                sidebarRouteItems[index].style.display = 'block';
            }

            sidebarMenuItems[index].addEventListener('click', function () {
                for (idx = 0; idx < sidebarMenuItems.length && idx < sidebarRouteItems.length; ++idx) {
                    if (idx === index) {
                        sidebarMenuItems[index].classList.add('selected')
                        sidebarRouteItems[index].style.display = "block"
                    } else {
                        sidebarMenuItems[idx].classList.remove("selected")
                        sidebarRouteItems[idx].style.display = ''
                    }
                }
            })
        }

    }
})()