<?php 
/**
 * CAT INSERT PAGE: MAIN CATEGORY SET DISPLAY AFTER DB INSERT OR CAT CREATION IN DB
 */
?>

<style>
#cat-display-ui-box {
    list-style: none;
}

#cat-display-ui-box ul {
    list-style: none;
}

#cat-display-ui-box ul ul {
    list-style: none;
}

#cat-display-ui-box ul ul ul {
    list-style: none;
}
</style>

<ul id="cat-display-ui-box" class="card  bg-light p-5 animate__animated animate__zoomIn d-none">
    <!-- <h5 class="font-weight-bold text-dark">New</h5> -->
    <li id="main-cat-display" class="text-dark font-weight-bold ml-1" style="list-style: none;">Tutoring</li>
    <ul>
        <li id="primo-cat-display" class="text-danger font-weight-bold">Math</li>
        <ul>
            <li id="secondo-cat-display" class="text-danger font-weight-bold">Grade 10</li>
            <ul>
                <li id="terzo-cat-display" class="text-danger font-weight-bold">Jackson Heights</li>
            </ul>
        </ul>
    </ul>
</ul>