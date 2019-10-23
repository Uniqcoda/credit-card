<template>
  <div>
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-primary btn-sm"
      data-toggle="modal"
      data-target="#exampleModal"
    >Mail</button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mail Card User?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
            <button
              type="button"
              class="btn btn-primary btn-sm"
              @click="sendMail(difference, card_id, user_id)"
            >OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["difference", "card_id", "user_id"],
  mounted() {
    // console.log("button mounted");
  },
  methods: {
    sendMail(difference, card_id, user_id) {
      axios
        .post(`/users/${user_id}/mail`, user_id)
        .then(res => {
          console.log(res);

          // alert(res.data);
          // window.location.reload();
        })
        .catch(err => console.log(err));
    }
  }
};
</script>
