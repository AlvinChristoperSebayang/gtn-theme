/**
 * 
 *
 * Utilities Lib
 *
 */

/**
 * Usefull Helpers
 */
export class UtilitiesHelpers {

    static getParam(url) {
        const paramUrl = url.split("?");
        if (paramUrl.length == 1) {
            return {};
        }
        const param = (function (a) {
            if (a == "") return {};
            var b = {};
            for (var i = 0; i < a.length; ++i) {
                var p = a[i].split("=", 2);
                if (p.length == 1) b[p[0]] = "";
                else b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
            }
            return b;
        })(paramUrl[1].split("&"));
        return param;
    }

    static backToTopOnReload() {
        if ("scrollRestoration" in history) {
            history.scrollRestoration = "manual";
        }

        window.scrollTo(0, 0);
    }

    /**
     * force all external to open in new tab
     */

    static forceExternalLinks() {
        for (var links = document.links, i = 0, a; (a = links[i]); i++) {
            if (a.host !== location.host) {
                a.target = "_blank";
                a.rel = "noreferrer";
            } else {
                a.rel = "noopener";
            }
        }
    }

    /**
     * Workaround to prevent broken wp plugins
     *
     * @param {*} container
     */
    static vueFixWpPlugins(container) {
        // console.log("vueFixWpPlugins");
        // look for styles inside vue elements
        const styles = container.querySelectorAll("style");
        // look for scripts inside vue elements
        const scripts = container.querySelectorAll("script");
        // just for gravity iform
        const iframes = container.querySelectorAll(
            "iframe[name*='gform_ajax_']"
        );

        if (scripts.length > 0) {
            for (const script of scripts) {
                document.body.appendChild(script);
            }
        }

        if (styles.length > 0) {
            for (const style of styles) {
                document.body.appendChild(style);
            }
        }

        if (iframes.length > 0) {
            for (const iframe of iframes) {
                document.body.appendChild(iframe);
            }
        }
    }

    static wpEditorOnUpdate(cb) {
        if (wp) {
            let contentState = wp.data
                    .select("core/editor")
                    .getEditedPostContent(),
                newContentState;
            wp.data.subscribe(
                _.debounce(() => {
                    newContentState = wp.data
                        .select("core/editor")
                        .getEditedPostContent();
                    if (contentState !== newContentState) {
                        cb();
                    }
                    // Update reference.
                    contentState = newContentState;
                }, 1000)
            );
        }
    }
}
