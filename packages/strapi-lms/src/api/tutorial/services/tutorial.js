"use strict";

/**
 * tutorial service.
 */

const { createCoreService } = require("@strapi/strapi").factories;

module.exports = createCoreService("api::tutorial.tutorial", () => ({
  generateSummary(data) {
    if (data.contents) {
      return data.contents.substring(0, 50);
    }

    return null;
  },
}));
