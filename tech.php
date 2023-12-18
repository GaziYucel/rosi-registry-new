<?php include_once('header.php'); ?>

<h1 class="page-title">Technical Overview</h1>

<p>
    This registry describes data sources for scientometric information.
    It is maintained by the ROSI project. <a href="about.php">Read more</a>.
</p>

<p class="alert alert-warning">
    This is a work in progress. You are invited to help filling the registry!
    Please contact us to add or change sources via our email address rosi.project(at)tib.eu.
</p>

<p class="alert alert-primary">
    Please click on a row to see all registered data for the source.
</p>

<p></p>

<input id="searchValue" class="box-shadow widthMedium" type="text" v-model="searchValue" placeholder="Search"/>

<p></p>

<table id="registry">
    <thead>
    <tr>
        <th class="row-col-1">Name</th>
        <th class="row-col-2">Interface</th>
        <th class="row-col-3">Type</th>
        <th class="row-col-4">Documentation</th>
        <th class="row-col-5">Format</th>
    </tr>
    </thead>
    <tbody>
    <template v-for="(row, index) in filteredRows">
        <tr class="row-parent pointer row"
            :class="{'row-striped': index % 2 ===0, 'row-parent-selected': row.showChild }">
            <td class="row-col-1" v-on:click="row.showChild = !row.showChild">{{ row.name }}</td>
            <td class="row-col-2" v-on:click="row.showChild = !row.showChild">{{ row.interface }}</td>
            <td class="row-col-3" v-on:click="row.showChild = !row.showChild">{{ row.interface_type }}</td>
            <td class="row-col-4" v-on:click="row.showChild = !row.showChild">{{ row.documentation }}</td>
            <td class="row-col-5" v-on:click="row.showChild = !row.showChild">{{ row.data_format }}</td>
        </tr>
        <tr v-if="row.showChild">
            <td colspan="5" class="row-child">
                <table>
                    <tr>
                        <td class="row-col-1">Logo</td>
                        <td class="row-col-2">
                            <img :src="row.image_url" v-if="row.image_url" alt="" />
                        </td>
                    </tr>
                    <template v-for="(value, key, index) in schema">
                        <tr v-if="options[key].form !== 'hidden'">
                            <td class="row-col-1">{{ value.title }}</td>
                            <td class="row-col-2">
                                <a :href="row[key]" v-if="options[key].form === 'url'" target="_blank">{{ row[key] }}</a>
                                <span v-else>{{ row[key] }}</span>
                            </td>
                        </tr>
                    </template>
                    <tr>
                        <td class="row-col-1" colspan="2">
                            Continue reading about this source in
                            <a :href="'https://core.ac.uk/search?q=' + row['name']" target="_blank">CORE</a> and
                            <a :href="'https://www.base-search.net/Search/Results?lookfor=' + row['name']" target="_blank">BASE</a>.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </template>
    </tbody>
</table>

<script>
    // Options, schema and sources data files
    let options = <?= json_encode(json_decode(file_get_contents('data/options.json'))) ?>;
    let schema = <?= json_encode(json_decode(file_get_contents('data/schema.json'))) ?>;
    let sources = <?= json_encode(json_decode(file_get_contents('data/sources.json'))) ?>;
</script>

<script type="text/javascript" src="assets/js/registry.js"></script>

<?php include_once('footer.php'); ?>
