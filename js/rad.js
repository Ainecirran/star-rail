document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('mainForm');
    var subForm = document.getElementById('subForm');
    var subContent = document.getElementById('subContent');
    var worldContent = document.getElementById('worldContent');

    form.addEventListener('change', function () {
        var selectedOption = document.querySelector('input[name="uni"]:checked').value;

        // Hide all content divs
        document.getElementById('content1').style.display = 'none';
        document.getElementById('content2').style.display = 'none';
        document.getElementById('content3').style.display = 'none';

        document.getElementById('subcontent3').style.display = 'none';
        document.getElementById('subcontent4').style.display = 'none';
        document.getElementById('subcontent5').style.display = 'none';
        document.getElementById('subcontent6').style.display = 'none';
        document.getElementById('subcontent7').style.display = 'none';
        document.getElementById('subcontent8').style.display = 'none';
        document.getElementById('subcontent0').style.display = 'none';

        // Show the selected content div
        document.getElementById('content' + selectedOption).style.display = 'block';

        // Clear subForm selection
        subForm.reset();
        
    });

    subForm.addEventListener('change', function () {
        var selectedSubOption = document.querySelector('input[name="uni_world"]:checked').value;

        // Hide all content divs
        document.getElementById('subcontent3').style.display = 'none';
        document.getElementById('subcontent4').style.display = 'none';
        document.getElementById('subcontent5').style.display = 'none';
        document.getElementById('subcontent6').style.display = 'none';
        document.getElementById('subcontent7').style.display = 'none';
        document.getElementById('subcontent8').style.display = 'none';
        document.getElementById('subcontent0').style.display = 'none';

        // Show the selected content div
        document.getElementById('subcontent' + selectedSubOption).style.display = 'block';

        // Clear subContent
        subContent.innerHTML = '';

        // Clear subForm selection
        worldContent.reset();
    });
});