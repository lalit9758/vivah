$(document).ready(function() {
    function randomizeArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function fetchservies() {
        $.ajax({
            url: 'controllers/vivahController?action=fetch_sevices',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Response:', response); // Debugging step

                if (response.status === 'success') {
                    let ServicesContent = '';
                    let Services = response.data;
                    Services = randomizeArray(Services);
                    Services.forEach(item => {
                        ServicesContent += `
                            <li>
                                <div class="gal-im">
                                    <img src="assets/images/couples/${item.image_name}" class="gal-siz-2" alt="" loading="lazy">
                                    <div class="txt">
                                        <span>${item.category}</span>
                                        <h4>${item.title}</h4>
                                        <p>${item.description}</p>
                                    </div>
                                </div>
                            </li>
                        `;
                    });

                    $('#wedding-services-list').html(ServicesContent);
                } else {
                    $('#wedding-services-list').html('<p>No data available</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching gallery data: " + status + " " + error);
                console.log("An error occurred while fetching gallery data. See console for details.");
            }
        });
    }

    fetchservies();
});
