"use strict";

/**
 * `is-manager` policy
 */

module.exports = (policyContext, config, { strapi }) => {
  // Add your own logic here.
  strapi.log.info("In is-manager policy.");

  const canDoSomething = true;

  if (canDoSomething) {
    return true;
  }

  return false;
};
