"use strict";

/**
 * classroom controller
 */

const { createCoreController } = require("@strapi/strapi").factories;
const { sanitize } = require("@strapi/utils");

module.exports = createCoreController(
  "api::classroom.classroom",
  ({ strapi }) => ({
    async find(ctx) {
      strapi.console.debug("hola");
      const { data, meta } = await super.find(ctx);
      meta.findTutorials = data.length + 100;
      return { data, meta };
    },
    async findTutorials(ctx) {
      const { params } = ctx;
      const results = await strapi
        .service("api::classroom.classroom")
        .findTutorials(params.id);

      const model = strapi.getModel("api::tutorial.tutorial");
      const sanatizedResults = await sanitize.contentAPI.output(results, model);

      return this.transformResponse(sanatizedResults);
    },
  })
);
