// Position main area due to fixed header
function onWindowResize() {
    let header = document.getElementById('header');
    let headerSpacer = document.getElementById('header-spacer');
    if (typeof (header) !== 'undefined' && header !== null &&
        typeof (headerSpacer) !== 'undefined' && headerSpacer !== null) {
        let headerHeight = header.offsetHeight;
        headerSpacer.style.height = (headerHeight).toString() + 'px';
    }
}

// Position searchValue field
function positionSearchValue() {
    let header = document.getElementById('header');
    let searchValue = document.getElementById('searchValue');
    if (typeof (header) !== 'undefined' && header !== null &&
        typeof (searchValue) !== 'undefined' && searchValue !== null) {
        let headerHeight = header.offsetHeight;
        searchValue.style.top = (headerHeight).toString() + 'px';
    }
}

// Execute on window load
window.onload = function () {
    onWindowResize();
    positionSearchValue();
    window.addEventListener("resize", onWindowResize);
    window.addEventListener("resize", positionSearchValue);
}