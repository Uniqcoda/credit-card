<template>
  <div>
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-danger btn-sm"
      data-toggle="modal"
      data-target="#exampleModal"
    >Delete</button>

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
            <h5 class="modal-title" id="exampleModalLabel">
              Delete {{brand}}
              <strong>{{number}}</strong>?
            </h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary btn-sm" @click="deleteCard">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["brand", "number"],
  mounted() {
    // console.log("Button mounted.");
  },
  methods: {
    deleteCard() {
      // alert("Sure to delete?");
    }
  }
};
</script>
