dayjs.extend(window.dayjs_plugin_advancedFormat)

const spinner = document.getElementById("spinner");

const resultCount = document.getElementById("resCount");
const queryDisplay = document.getElementById("actualQuery");

/**
 * @constant
 * @type {HTMLFormElement}
 */
const searchForm = document.getElementById("search-form");

const eventResultContainer = document.getElementById("event-results");

(async function () {
    showSpinner();
    let windowUrl = new URLSearchParams(window.location.search);
    searchForm.elements['query'].value = windowUrl.get('query');
    queryDisplay.innerHTML = windowUrl.get("query");
    let data = await makeRequest(windowUrl.get("query"),
        windowUrl.get("fromDate"),
        windowUrl.get("fromTime"),
        windowUrl.get("eventType"),
        windowUrl.get("eventCategory"),
    )
    hideSpinner();
    resultCount.innerHTML = `${data.length} event${data.length > 1 ? 's' : ''} found !`;
    renderResults(data);
})()


function showSpinner() {
    spinner.classList.remove('hidden');
}

function hideSpinner() {
    spinner.classList.add("hidden");
}


function genCard(id, image, name, fromTime, toTime, fromDate, toDate, location) {

    return `<li>
                        <a href="/event.php?event=${id}" class="preview-card">
                            <div>
                                <img class="image" src="${image}" />
                            </div>
                            <div class="content">
                                <h2 class="title">${name}</h2>
                                <ul class="extra-details">
                                    <li>
                                        <i class="far fa-clock"></i>
                                        ${fromTime} - ${toTime}
                                    </li>
                                    <li>
                                        <i class="far fa-calendar-alt"></i>
                                        ${fromDate === toDate ? fromDate : (fromDate + ' - ' + toDate)}
                                    </li>
                                    <li>
                                        <i class="fas fa-map-marked-alt"></i>
                                        ${location}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>`
}


/**
 * 
 * @param {Array} data 
 */

function renderResults(data) {
    eventResultContainer.innerHTML = data.map((item) => {
        let from = dayjs.unix(item.startTime);
        let to = dayjs.unix(item.endTime);
        let fromDate = from.format("Do MMMM YYYY");
        let endDate = to.format("Do MMMM YYYY");
        let fromTime = from.format("hh:mm a");
        let toTime = to.format("hh:mm a");
        return genCard(item.id, item.image, item.name, fromTime, toTime, fromDate, endDate, item.isOnline ? "Remote" : item.location)
    }).join("");

}

async function makeRequest(query, fromDate, fromTime, type, category) {
    let params = new URLSearchParams();
    params.append("query", query);
    params.append("fromDate", fromDate);
    params.append("fromTime", fromTime);
    params.append("type", type);
    params.append("category", category);
    let result = await fetch("/api/events/read.php?" + params);
    return await result.json();
}

searchForm.addEventListener("submit", async function (event) {
    showSpinner();
    event.preventDefault();
    queryDisplay.innerHTML = searchForm.elements["query"].value;
    let data = await makeRequest(
        searchForm.elements["query"].value,
        searchForm.elements["fromDate"].value,
        searchForm.elements["fromTime"].value === "All" ? "" : searchForm.elements["fromTime"].value,
        searchForm.elements["category"].value === "All" ? "" : searchForm.elements["category"].value,
        searchForm.elements["type"].value === "All" ? "" : searchForm.elements["type"].value,
    )

    hideSpinner();

    resultCount.innerHTML = `${data.length} event${data.length > 1 ? 's' : ''} found !`;
    renderResults(data);
});