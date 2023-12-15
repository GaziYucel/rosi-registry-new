// Sources for usage in Vue.js
let rows = JSON.parse(JSON.stringify(sources));

// Sort sources Name ascending
rows = rows.sort((a, b) => a.name.localeCompare(b.name));

// Add extra columns for show/hide child and the search string
for (let i = 0; i < rows.length; i++) {
    rows[i]["showChild"] = false;
    rows[i]["searchString"] = '';
    Object.keys(schema).forEach(key => {
        rows[i]["searchString"] += rows[i][key] + ' ';
    });
}

// VueJS
const {createApp} = Vue;
let vueApp = createApp({
    data() {
        return {
            rows: rows,
            schema: schema,
            options: options,
            searchValue: ''
        }
    },
    methods: {},
    computed: {
        filteredRows() {
            let tempRows = this.rows;
            if (this.searchValue !== '' && this.searchValue) {
                tempRows = tempRows.filter((item) => {
                    return item.searchString
                        .toUpperCase()
                        .includes(this.searchValue.toUpperCase())
                });
            }
            return tempRows;
        }
    }
});

vueApp.mount('#main');
