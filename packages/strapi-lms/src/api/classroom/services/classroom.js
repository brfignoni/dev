"use strict";

/**
 * classroom service.
 */

const { createCoreService } = require("@strapi/strapi").factories;

module.exports = createCoreService(
  "api::classroom.classroom",
  ({ strapi }) => ({
    async findTutorials(classroomId) {
      return strapi.entityService.findMany("api::tutorial.tutorial", {
        filters: { classroom: classroomId },
        populate: ["classroom", "classroom.manager", "coverimage"],
      });
    },
  })
);
