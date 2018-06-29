(function($) {

    class Calendar
    {
        /**
         * Initialise le calendrier
         */
        constructor(container)
        {
            this.container = container;
            this.updateHour();
            this.initNavigation();
        }

        /**
         * Met à jour l'heure
         */
        updateHour()
        {
            var hour = new Date().toLocaleString('fr-FR', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });

            $(this.container).find('.current-hour').text(hour);

            setTimeout(() => this.updateHour(), 1000);
        }

        /**
         * Initialise la navigation asynchrone
         */
        initNavigation()
        {
            $(document).on('click', this.container + ' [data-change-month]', this.navigate(this));
        }

        /**
         * Exécute une requête asynchrone pour récupérer le mois à afficher
         */
        navigate(classInstance)
        {
            return function(event)
            {
                event.preventDefault();

                var url = $(this).attr('href');
    
                $.ajax({
                    url : url,
                    success : response => $(classInstance.container).find('[data-body]').html(response)
                });
            }
        }
    }

    $(document).ready(() => new Calendar('.calendar-container'));

})(jQuery);
