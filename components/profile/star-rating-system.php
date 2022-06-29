<!-- Star Rating System Start -->
<script>
// Rating
$("#myRange").mousemove(function() {
    $("#rangeValue").text($("#myRange").val());
});
</script>
<div class="star-rating">
    <p>Drag slider below to rate product</p>
    <input type="range" id="myRange" value="1" max="5">
    <div id="rangeValue">1</div>
</div>
<!-- Star Rating System End -->