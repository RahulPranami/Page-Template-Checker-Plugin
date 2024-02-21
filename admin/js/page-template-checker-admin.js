(function ($) {
    "use strict";
    jQuery(function ($) {
        $("#default-tab").on("click", function (e) {
            if (e.target.tagName === "BUTTON") {
                let targetTabId = e.target.getAttribute("data-tabs-target");
                let targetTabPanel = document.querySelector(targetTabId);

                // Hide all tab panels
                Array.from(
                    document.querySelectorAll(
                        "#default-tab-content div.tab-content"
                    )
                ).forEach((tabPanel) => {
                    tabPanel.setAttribute("aria-hidden", "true");
                    tabPanel.classList.add("hidden");
                });

                if (targetTabPanel) {
                    // Show targeted tab panel
                    targetTabPanel.setAttribute("aria-hidden", "false");
                    targetTabPanel.classList.remove("hidden");
                }

                // Reset all buttons
                Array.from(e.currentTarget.querySelectorAll("button")).forEach(
                    (button) => {
                        button.setAttribute("aria-selected", "false");
                        button.classList.remove(
                            "text-blue-600",
                            "border-b-2",
                            "border-blue-600",
                            "active"
                        );
                    }
                );

                // Set aria-selected to true for the clicked tab button
                e.target.setAttribute("aria-selected", "true");
                e.target.classList.add(
                    "text-blue-600",
                    "border-b-2",
                    "border-blue-600",
                    "active"
                );
            }
        });
    });
})(jQuery);
