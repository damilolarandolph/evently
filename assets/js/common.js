
// Initiating All radio-tab groups
(function () {
    let tabTriggers = document.querySelectorAll(".radio-tabs")

    for (let trigger of tabTriggers) {
        let id = trigger.getAttribute("for")
        let tabsContainer = document.querySelector(`#${id}`);
        let tabs = document.querySelectorAll(`#${id} > *`)
        let radios = trigger.querySelectorAll(":scope .radio input")
        let hasSelected = false;
        for (let index = 0; index < radios.length && index < tabs.length; ++index) {
            if (!radios[index].classList.contains("selected")) {
                tabs[index].style.display = 'none'
                radios[index].checked = false;
            } else {
                radios[index].checked = true;
                hasSelected = true;
            }
            radios[index].addEventListener("change", function (event) {
                for (let tab of tabsContainer.children) {
                    tab.style.display = 'none'
                }
                tabs[index].style.display = '';
            })

        }
        if (!hasSelected) {
            radios[0].checked = true
            tabs[0].style.display = ''
        }
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
})();

(function () {

    const timeLists = document.querySelectorAll(".time-list");
    let innerHTML = ""
    for (let start = 0; start < 24; ++start) {
        innerHTML += `<option> ${start < 10 ? '0' : ''}${start}:00 </option>`
        innerHTML += `<option>${start < 10 ? '0' : ''}${start}:30 </option>`
    }

    for (let list of timeLists) {
        list.innerHTML = innerHTML
    }

})();


(function () {
    const countdowns = document.querySelectorAll(".countdown");
    /**
     * 
     * @param {Element} elem 
     * @param {Number} timestamp 
     */
    let genCountDown = function (timestamp) {
        let _second = 1;
        let _minute = _second * 60;
        let _hour = _minute * 60;
        let _day = _hour * 24;
        let _now = Date.now() / 1000;
        let distance = timestamp - _now;
        let days = Math.floor(distance / _day);
        let hours = Math.floor((distance % _day) / _hour);
        let minutes = Math.floor((distance % _hour) / _minute);
        let seconds = Math.floor((distance % _minute) / _second);

        return `${days + "d"} ${hours + "h"} ${minutes + "m"} ${seconds + "s"}`
    }
    let countDownWrapper = function (elem, timestamp) {
        elem.innerHTML = genCountDown(timestamp);
    }
    for (let countdown of countdowns) {
        countDownWrapper(countdown, countdown.getAttribute("endTime"))
        setInterval(() => {
            countDownWrapper(countdown, countdown.getAttribute("endTime"))
        }, 1000);
    }
})();